$(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
function xacnhanxoa(msg)
{
	if(window.confirm(msg)){
		return true;
	}
	return false;
}
function CopyMe(oFileInput, sTargetID) {
    var arrTemp = oFileInput.value.split('\\');
    document.getElementById(sTargetID).value = 'img/'+arrTemp[arrTemp.length - 1];
}
$(".thumbnail").click(function() {
    $("#mainImage").attr("src", $(this).attr("src"));
});
function changeImageOnClick(event)
{
    event = event || window.event;
    var targetElement = event.target || event.srcElement;
	if (targetElement.tagName == "IMG")
    {
        mainImage.src = targetElement.getAttribute("src");
	}
}