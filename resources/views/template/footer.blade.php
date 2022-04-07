<script type="text/javascript" src="{{ url('resources/js/app.js') }}"></script>

<script type="text/javascript" src="{{ url('resources/js/ckeditor.js') }}"></script>
{{--<script src="https://cdn.ckeditor.com/4.18.0/standard-all/ckeditor.js"></script>--}}
<script>
    // We need to turn off the automatic editor creation first.
    CKEDITOR.disableAutoInline = true;

    CKEDITOR.replace('editor1');
    CKEDITOR.replace('editor2');
</script>
