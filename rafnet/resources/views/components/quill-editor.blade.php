<div>
    <div id="editor-container" class="h-64"></div>

    <textarea id="quill-content" name="{{ $name }}" style="display:none;"></textarea>
</div>

@push('scripts')
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var quill = new Quill('#editor-container', {
            theme: 'snow'
        });

        // Sync the content of the editor with the hidden textarea
        quill.on('text-change', function() {
            document.querySelector('#quill-content').value = quill.root.innerHTML;
        });
    });
</script>
@endpush