<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&amp;display=swap" rel="stylesheet">
<link class="js-stylesheet" href="{{ url('resources/css/light.css') }}" rel="stylesheet">
<link class="js-stylesheet" href="{{ url('resources/css/app.css') }}" rel="stylesheet">
<link class="js-stylesheet" href="{{ url('resources/css/jquery.dataTables.min.css') }}" rel="stylesheet">


<link class="js-stylesheet" href="{{ url('resources/css/material-icons.css') }}" rel="stylesheet">

{{--<script type="text/javascript" src="{{ url('resources/js/settings.js') }}"></script>--}}
<script type="text/javascript" src="{{ url('resources/js/jquery-3.6.0.min.js') }}"></script>
<script type="text/javascript" src="{{ url('resources/js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ url('resources/js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ url('resources/js/bootstrap.min.js') }}"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery-autocomplete/1.0.7/jquery.auto-complete.css">


<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-autocomplete/1.0.7/jquery.auto-complete.min.js"></script>





{{--<script type="text/javascript" src="{{ url('resources/js/jquery.auto-complete.min.js') }}"></script>--}}



{{--<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">--}}
{{--<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">--}}



<script>
    $(document).ready( function () {
        $("body .assignToUser").on("change" , function(){
            $.ajax({
                type: "GET",
                url: $('#body').attr('data-url')+"update-assign-to/" + $(this).val()+"/"+$(this).parent().parent().find('.assignToTicketId').html(),
                success: function(response){
                    if (response == 1)
                    {
                        $(".ticketAssigned").css('display','block');
                    }
                    // $('#settingsMessage').html(response["success"]);
                }
            });
        });
        // $("#FAItems").keyup(function(){
        //     $.ajax({
        //         type: "POST",
        //         url: "$('#body').attr('data-url')+'getFAItem",
        //         data:'keyword='+$(this).val(),
        //         beforeSend: function(){
        //             $("#FAItems").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
        //         },
        //         success: function(data){
        //             $("#suggesstion-box").show();
        //             $("#suggesstion-box").html(data);
        //             $("#search-box").css("background","#FFF");
        //         }
        //     });
        // });



        $('#myDataTable').DataTable({
            ordering: false,
            autoWidth: true,
            "aLengthMenu": [[50, 75, 100, -1], [50, 75, 100, "All"]],
            "iDisplayLength": 50
        });
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
            {{--var returnArray = [];--}}
            $.ajax({
                url: $('#body').attr('data-url')+'getFAItem',
                type:'post',
                data:'id='+deptid+'&_token={{csrf_token()}}',
                success:function (data){
                    $('#FAItems').empty();
                    $('#FAItems').append("<option value=''> -- Select FA Item -- </option>");
                    for(var i = 0; i < data.length ; i++)
                    {
                        $('#FAItems').append("<option value='"+data[i].id+"'>"+data[i].DESCRIPTION+"</option>");
                        // var id = (data[i].id);
                        // returnArray.push({'value':data[i].DESCRIPTION,'data':data[i].id});
                    }
                    // loadSuggestion(returnArray);
                }
            });
            {{--function loadSuggestion(options)--}}
            {{--{--}}
            {{--    $('#FAItems').autoComplete({--}}
            {{--        lookup:options,--}}
            {{--        onSelect:function (selection){--}}
            {{--            console.log(selection);--}}
            {{--        }--}}
            {{--    })--}}
            {{--}--}}

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
    });

</script>
