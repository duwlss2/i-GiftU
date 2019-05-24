<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>
    </title>

    <!-- Include stylesheet -->
    <link href="https://cdn.quilljs.com/1.2.0/quill.snow.css" rel="stylesheet">
  </head>
  <body>
    <!-- Create the editor container -->
    <div id="editor">
      <p>Hello World!</p>
      <p>Some initial <strong>bold</strong> text</p>
      <p><br></p>
    </div>

    <!-- Include the Quill library -->
    <script src="https://cdn.quilljs.com/1.2.0/quill.js"></script>

    <!-- Initialize Quill editor -->
    <script>
      var quill = new Quill('#editor', {
        modules: {
          toolbar: false
        },
        theme: 'snow'
      });
    </script>

  </body>
</html>
