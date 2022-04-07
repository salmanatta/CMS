<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&amp;display=swap" rel="stylesheet">
<link class="js-stylesheet" href="{{ url('resources/css/light.css') }}" rel="stylesheet">
<link class="js-stylesheet" href="{{ url('resources/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<script type="text/javascript" src="{{ url('resources/js/settings.js') }}"></script>
<script type="text/javascript" src="{{ url('resources/js/jquery-3.6.0.min.js') }}"></script>
<script type="text/javascript" src="{{ url('resources/js/jquery.dataTables.min.js') }}"></script>


{{--<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">--}}
{{--<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">--}}



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
                   $('#sectiondropdown').append("<option value=''> -- Select Section -- </option>");
                   for (var i = 0 ; i < result.length ; i++)
                   {
                       $('#sectiondropdown').append("<option value='"+result[i].id+"'>"+result[i].name+"</option>");
                   }
                }
            });
        });
    });
    function validateFileType(){
        var fileElement = document.getElementById("fileName");
        var fileExtension = "";
        if (fileElement.value.lastIndexOf(".") > 0) {
            fileExtension = fileElement.value.substring(fileElement.value.lastIndexOf(".") + 1, fileElement.value.length);
        }
        if (fileExtension.toLowerCase() == "gif" || fileExtension.toLowerCase() == "png") {
            return true;
        }
        else {
            document.getElementById("fileName").value =null;
            alert("You must select image file only");
            return false;
        }
    }
</script>
