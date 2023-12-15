/**
 * Theme: Attex - Responsive Bootstrap 5 Admin Dashboard
 * Author: Coderthemes - Edited By Ali Emin Çomoğlu
 * Component: Full-Calendar
 */

import bootstrap from 'bootstrap/dist/js/bootstrap.min';
import {Calendar} from '@fullcalendar/core';
import interactionPlugin, {Draggable} from '@fullcalendar/interaction';
import timeGridPlugin from '@fullcalendar/timegrid';
import listPlugin from '@fullcalendar/list';
import dayGridPlugin from '@fullcalendar/daygrid';
import bootstrapPlugin from '@fullcalendar/bootstrap';

import 'fullcalendar/main.min.js'
import 'flatpickr/dist/flatpickr.js'
const today = new Date();
const oneWeekLater = new Date().setDate(today.getDate() + 1);
var fp = $('#date').flatpickr({
    minDate: oneWeekLater,
    mode: "range",
});
!function ($) {
    "use strict";
    var handleListingChange = function(listing) {
        let selectedListing = listing;
        let listingReservations = calendarReservations.filter(obj => obj.title === selectedListing);
        let flatpickrDisableFormat = listingReservations.map(reservation => {
            return {
                from: reservation.start,
                to: reservation.end
            };
        });
        console.log(flatpickrDisableFormat)
        fp.set("disable",flatpickrDisableFormat);
    };
    $('#listing-select').on('change', function (){
        handleListingChange($(this).val());
    })
    var CalendarApp = function () {
        this.$body = $("body"),
            this.$modal = new bootstrap.Modal(document.getElementById('event-modal'), {backdrop: 'static'}),
            this.$loadingModal = new bootstrap.Modal(document.getElementById('loading-modal'), {backdrop: 'static'}),
            this.$noticeModal = new bootstrap.Modal(document.getElementById('notice-modal'), {backdrop: 'static'}),
            this.$calendar = $('#calendar'),
            this.$formEvent = $("#form-event"),
            this.$btnNewEvent = $("#btn-new-event"),
            this.$btnDeleteEvent = $("#btn-delete-event"),
            this.$btnSaveEvent = $("#btn-save-event"),
            this.$modalTitle = $("#modal-title"),
            this.$calendarObj = null,
            this.$selectedEvent = null,
            this.$newEventData = null
    };


    /* on click on event */
    CalendarApp.prototype.onEventClick = function (info) {
        this.$formEvent[0].reset();
        this.$formEvent.removeClass("was-validated");

        this.$newEventData = null;
        this.$btnDeleteEvent.show();
        this.$modalTitle.text('Edit Reservation');
        this.$modal.show();
        this.$selectedEvent = info.event;
        $("#listing-select").val(this.$selectedEvent.title);
        handleListingChange(this.$selectedEvent.title);
        fp.setDate([this.$selectedEvent.startStr,new Date($.now())]);
    },

        /* on select */
        CalendarApp.prototype.onSelect = function (info) {
            this.$formEvent[0].reset();
            this.$formEvent.removeClass("was-validated");

            this.$selectedEvent = null;
            this.$newEventData = info;
            this.$btnDeleteEvent.hide();
            this.$modalTitle.text('New Reservation');

            this.$modal.show();
            this.$calendarObj.unselect();
            fp.setDate([this.$newEventData.startStr,this.$newEventData.endStr]);
            console.log(this.$newEventData.start);
        },

        CalendarApp.prototype.onResize = function (eventResizeInfo) {
            this.$formEvent[0].reset();
            this.$formEvent.removeClass("was-validated");

            this.$newEventData = null;
            this.$btnDeleteEvent.hide();
            this.$modalTitle.text('Edit Reservation');
            this.$modal.show();
            this.$selectedEvent = eventResizeInfo.event;
            $("#listing-select").val(this.$selectedEvent.title);
            handleListingChange(this.$selectedEvent.title);
            fp.setDate([this.$selectedEvent.startStr,(new Date(this.$selectedEvent.end))-1]);
        },

        /* Initializing */
        CalendarApp.prototype.init = function () {
            /*  Initialize the calendar  */
            var today = new Date($.now());

            // var Draggable = FullCalendar.Draggable;
            var externalEventContainerEl = document.getElementById('external-events');

            // init dragable
            new Draggable(externalEventContainerEl, {
                itemSelector: '.external-event',
                eventData: function (eventEl) {
                    return {
                        title: eventEl.innerText,
                        className: $(eventEl).data('class')
                    };
                }
            });

            var $this = this;

            // cal - init
            $this.$calendarObj = new Calendar($this.$calendar[0], {
                plugins: [dayGridPlugin, bootstrapPlugin, interactionPlugin, listPlugin, timeGridPlugin],
                slotDuration: '00:15:00', /* If we want to split day time each 15minutes */
                slotMinTime: '00:00:00',
                slotMaxTime: '00:00:00',
                themeSystem: 'bootstrap',
                bootstrapFontAwesome: false,
                buttonText: {
                    today: 'Today',
                    month: 'Month',
                    week: 'Week',
                    day: 'Day',
                    list: 'List',
                    prev: 'Prev',
                    next: 'Next'
                },
                initialView: 'dayGridMonth',
                handleWindowResize: true,
                height: $(window).height() - 200,
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
                },
                events: calendarReservations,
                selectMirror: true,
                editable: true,
                droppable: true,
                selectable: true,
                eventOverlap: function (stillEvent, movingEvent) {
                    return stillEvent.title !== movingEvent.title;
                },
                eventAllow: function (dropInfo, draggedEvent) {
                    return dropInfo.start >= oneWeekLater;
                },
                eventReceive: function (info) {
                    return info.event.title !== info.draggedEl.textContent;
                },
                select: function (info) {
                    if (info.start >= oneWeekLater) {
                        $this.onSelect(info);
                    }
                },
                selectOverlap: false,
                eventDrop: function (info) {
                    if (info.event.start <= oneWeekLater && info.event.title === info.draggedEl.textContent) {
                        info.revert();
                    } else {
                        $this.onResize(info);
                    }
                },
                eventResize: function (info) {
                    if (info.event.start <= oneWeekLater) {
                        info.revert();
                    } else {
                        $this.onResize(info);
                    }
                },
                eventClick: function (info) {
                    if (!info.event.extendedProps.preventClick) {
                        $this.onEventClick(info);
                    }
                },
            });

            $this.$calendarObj.render();

            // on new event button click
            $this.$btnNewEvent.on('click', function (e) {
                $this.onSelect({date: new Date(), allDay: true});
            });

            // make reservation
            $this.$formEvent.on('submit', function (e) {
                e.preventDefault();
                let options = {
                    weekday: 'long',
                    year: 'numeric',
                    month: 'long',
                    day: '2-digit'
            };
                let reservationName = $('#name').val();
                let propertyName = $('#listing-select').val();
                let dates = $('#date').val().split('to');
                console.log(dates);
                let checkInDate = new Date(dates[0]).toLocaleDateString(undefined, options);
                let checkOutDate = new Date(dates[1]).toLocaleDateString(undefined, options);
                console.log(checkInDate);
                $('#reservation-name').text(reservationName);
                $('#property-name').text(propertyName);
                $('#check-in').text(checkInDate);
                $('#check-out').text(checkOutDate);
                var form = $this.$formEvent[0];
                // validation
                if (form.checkValidity()) {
                    $this.$modal.hide();
                    $this.$noticeModal.show();
                    $('#accept-btn').on('click', function () {
                        $this.$loadingModal.show();
                        e.target.submit();
                    });
                } else {
                    e.stopPropagation();
                    form.classList.add('was-validated');
                }
            });

            // delete event
            $($this.$btnDeleteEvent.on('click', function (e) {
                if ($this.$selectedEvent) {
                    $this.$selectedEvent.remove();
                    $this.$selectedEvent = null;
                    $this.$modal.hide();
                }
            }));
        },

        //init CalendarApp
        $.CalendarApp = new CalendarApp, $.CalendarApp.Constructor = CalendarApp
}(window.jQuery),

    //initializing CalendarApp
    function ($) {
        "use strict";
        $.CalendarApp.init()
    }(window.jQuery);
