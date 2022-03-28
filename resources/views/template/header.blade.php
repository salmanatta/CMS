<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&amp;display=swap" rel="stylesheet">
<link class="js-stylesheet" href="{{ url('resources/css/light.css') }}" rel="stylesheet">
<link class="js-stylesheet" href="{{ url('resources/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<script type="text/javascript" src="{{ url('resources/js/settings.js') }}"></script>
<script type="text/javascript" src="{{ url('resources/js/jquery-3.6.0.min.js') }}"></script>
<script type="text/javascript" src="{{ url('resources/js/jquery.dataTables.min.js') }}"></script>

<script>
    $(document).ready( function () {
        $('#myDataTable').DataTable();
        $('#deptdropdown').change(function ()
        {
            let deptid = $(this).val();
            $.ajax({
               url: $("#body").attr('data-url')+'getSection',
               type:'post',
               data:'id='+deptid+'&_token={{ csrf_token() }}',
               success:function (result){
                   $('#sectiondropdown').empty();
                   $('#sectiondropdown').append("<option> -- Select Section -- </option>");
                   for (var i = 0 ; i < result.length ; i++)
                   {
                       $('#sectiondropdown').append("<option value='"+result[i].id+"'>"+result[i].name+"</option>");
                   }
                }
            });
        });
    });
</script>
