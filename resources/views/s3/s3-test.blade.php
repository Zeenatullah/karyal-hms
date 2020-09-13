<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>S3 Testing Page</title>
    <style>
        form {
            padding: 20px 0;
            width: 500px;
        }
        
        fieldset {
            padding: 15px;
        }

        label {
            display: block;
            margin-bottom: 15px;
        }

        form button[type=submit] {
            border: 2px solid deepskyblue;
            background-color: lightskyblue;
            border-radius: 4px;
            padding: 5px 15px;
        }
    </style>
</head>
<body>
    <h1>S3 Testing Page</h1>

    <form action="/s3" method="post" enctype="multipart/form-data">
        @csrf
        
        <fieldset>
            <legend>Upload Files</legend>
            <label>File: <input type="file" name="files[]" multiple></label>
            <button type="submit">Upload</button>
        </fieldset>
    </form>

    <h2>All Existing Files</h2>
    <ul>
        @foreach ($files as $file)
        <li><a href="{{ Storage::disk('s3')->url($file->url) }}" target="_blank">{{ $file->filename }}</a></li>
        @endforeach
    </ul>
</body>
</html>