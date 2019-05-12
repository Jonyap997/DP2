    
function downloadPDF() {
  var canvas = document.querySelector('#salesChart');
	//creates image
	var canvasImg = canvas.toDataURL("image/jpeg", 1.0);
  
	//creates PDF from img
	var doc = new jsPDF('landscape');
	doc.setFontSize(20);
	doc.text(15, 15, "Sales Chart");
	doc.addImage(canvasImg, 'JPEG', 10, 10, 280, 150 );
	doc.save('sales report.pdf');
}



