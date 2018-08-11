
$('tr.clickable').click(function () {
    id = $(this).attr('id');
    window.location.replace('detailsCandidature.php?id='+id)
});


