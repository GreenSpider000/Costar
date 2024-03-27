<!-- TinyMce -->
@props(["selector"=>""])

@if($selector)
    @push('after-scripts')
    <script src="{{ asset('vendor/tinymce/tinymce.min.js') }}"></script>
    <script type="module">
        tinymce.init({
            selector: '{{$selector}}',
            // skin:'oxide-dark',
            language:'zh_CN',
            plugins: [
                'print',
                'preview',
                'searchreplace',
                'autolink',
                'directionality',
                'visualblocks',
                'visualchars',
                'fullscreen',
                'image',
                'link',
                'media',
                'template',
                'code',
                'codesample',
                'table',
                'charmap',
                'hr',
                'pagebreak',
                'nonbreaking',
                'anchor',
                'insertdatetime',
                'advlist',
                'lists',
                'wordcount',
                'imagetools',
                'textpattern',
                'emoticons',
                'autosave',
                'help',
            ],
            toolbar: 'code undo redo restoredraft | forecolor backcolor bold italic underline strikethrough link anchor | alignleft aligncenter alignright alignjustify outdent indent lineheight | styleselect formatselect fontselect fontsizeselect | bullist numlist | blockquote subscript superscript removeformat | table image media charmap emoticons hr pagebreak insertdatetime print preview | fullscreen',
            height: 650,
            min_height: 400,
            toolbar_sticky: true,
            autosave_ask_before_unload: false,
            /*content_css: [ 
                // CSS that can display content in the editing area
                '/static/reset.css',
                '/static/ax.css',
                '/static/css.css',
            ],*/
            fontsize_formats: '12px 14px 16px 18px 24px 36px 48px 56px 72px',
            font_formats: 'Microsoft YaHei,Helvetica Neue,PingFang SC,sans-serif;PingFang SC,Microsoft YaHei,sans-serif;宋体=simsun,serif;FangSong,serif;SimHei,sans-serif;Arial=arial,helvetica,sans-serif;Arial Black=arial black,avant garde;Book Antiqua=book antiqua,palatino;',
            link_list: [
                { title: 'Preset link', value: 'https://www.tiny.cloud' },
                { title: 'Preset link', value: 'https://www.tiny.cloud' }
            ],
            image_list: [
                { title: 'Preset image', value: 'https://www.tiny.cloud/images/glyph-tinymce@2x.png' },
                { title: 'Preset image', value: 'https://www.tiny.cloud/images/glyph-tinymce@2x.png' }
            ],
            image_class_list: [
                { title: 'None', value: '' },
                { title: 'Some class', value: 'class-name' }
            ],
            importcss_append: true,
            file_picker_callback: function (callback, value, meta) {
                if (meta.filetype === 'file') {
                  callback('https://www.baidu.com/img/bd_logo1.png', { text: 'My text' });
                }
                if (meta.filetype === 'image') {
                  callback('https://www.baidu.com/img/bd_logo1.png', { alt: 'My alt text' });
                }
                if (meta.filetype === 'media') {
                  callback('movie.mp4', { source2: 'alt.ogg', poster: 'https://www.baidu.com/img/bd_logo1.png' });
                }
            },
        });
    </script>
    @endpush
@endif