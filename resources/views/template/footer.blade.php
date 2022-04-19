<script type="text/javascript" src="{{ url('resources/js/app.js') }}"></script>
<script type="text/javascript" src="{{ url('resources/js/ckeditor.js') }}"></script>
{{--<script src="https://cdn.ckeditor.com/4.18.0/standard-all/ckeditor.js"></script>--}}
<script>
    // We need to turn off the automatic editor creation first.
    CKEDITOR.disableAutoInline = true;

    CKEDITOR.replace('editor1');
    CKEDITOR.replace('editor2');
</script>
<script>
    function showComment(comment)
    {
        $('#exampleModalCenter').modal()                      // initialized with defaults
        $('#exampleModalCenter').modal({ keyboard: false })   // initialized with no keyboard
        $('#exampleModalCenter').modal('show')
        var comt = comment.comment.toString();
        comt = comt.replace( /(<([^>]+)>)/ig, '');
        $("#modalid").text(comt);
    }
    $(document).ready(function (){

    });
</script>
