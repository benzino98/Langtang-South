import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

// Initialize CKEditor on any element with the 'ckeditor' class
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.ckeditor').forEach((element) => {
        ClassicEditor
            .create(element, {
                toolbar: [
                    'heading',
                    '|',
                    'bold',
                    'italic',
                    'link',
                    'bulletedList',
                    'numberedList',
                    '|',
                    'blockQuote',
                    'insertTable',
                    'undo',
                    'redo',
                ],
                heading: {
                    options: [
                        { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                        { model: 'heading1', view: 'h2', title: 'Heading 1', class: 'ck-heading_heading1' },
                        { model: 'heading2', view: 'h3', title: 'Heading 2', class: 'ck-heading_heading2' },
                    ],
                },
            })
            .catch((error) => {
                console.error(error);
            });
    });
});
