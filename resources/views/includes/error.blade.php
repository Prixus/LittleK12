@if(count($errors) > 0 )
  @foreach($errors->all() as $error)
  <script>
  new PNotify({
      title: "Validation",
      text: "{{$error}}",
      type: "error",
      styling: "bootstrap3"
  });
  </script>
  @endforeach
@endif
