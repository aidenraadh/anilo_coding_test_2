<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tugas 2</title>
</head>
<body style="padding: 4rem 4vw 0">
@yield('content')
<script defer>
$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})

$('#toggle-update-score-btn').on('click', function (e) {
  const student_id = e.target.getAttribute('data-student-id');
  const subject_id = e.target.getAttribute('data-subject-id');
  const score = e.target.getAttribute('data-score');
  const score_id = e.target.getAttribute('data-score-id');

  $('#update-student-id-form').val(student_id);
  $('#update-subject-id-form').val(subject_id);
  $('#update-score-form').val(score);
  $('#update-score-form-tag').attr({
    action:
    $('#update-score-form-tag').attr('action')+'/'+score_id
  });
});
</script>
</body>
</html>
