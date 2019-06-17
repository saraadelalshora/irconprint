
 @if(Session::has('success'))
 <script>
     swal("تنبية!", "{{Session::get('success')}}!", "success");
 </script>
 @elseif(Session::has('error'))
 <script>
     swal("تنبية!", "{{Session::get('error')}}!", "error");
 </script>
 @endif
