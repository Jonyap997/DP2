function saveAsPDF() {
   html2canvas(document.getElementById("chart_container"), {
      onrendered: function(canvas) {
         var img = canvas.toDataURL(); //image data of canvas
         var doc = new jsPDF();
         doc.addImage(img, 10, 10);
         doc.save('Report.pdf');
      }
   });
}

