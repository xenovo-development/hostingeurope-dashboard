/*
Author: Emin Çomoğlu
Contact: emin-comoglu@hotmail.com
File: invoice.js
*/

import html2canvas from "html2canvas";
import jsPDF from "jspdf";


$('#download-btn').on('click', function (){
    const pdf = new jsPDF("p", "pt", "a4");
    pdf.addImage(document.getElementById('invoice-content'), 0,0);
    pdf.save();
    html2canvas(document.body).then(canvas => {
        const imgData = canvas.toDataURL('image/png');

    });
});

