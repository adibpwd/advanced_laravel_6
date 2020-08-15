<!DOCTYPE html>
<html>
<style>
    @charset "UTF-8";
    @import url(https://fonts.googleapis.com/css?family=Varela+Round);

    html {
        box-sizing: border-box;
    }

    *,
    *:before,
    *:after {
        box-sizing: inherit;
    }

    html {
        background: #181818;
        overflow-y: scroll;
    }

    body {
        position: relative;
        font: 1em/1.6 "Varela Round", Arial, sans-serif;
        color: #999;
        font-weight: 400;
        max-width: 25em;
        padding: 1em;
        margin: 10% auto;
    }

    h2 {
        font-weight: 400;
    }

    .filupp>input[type="file"] {
        position: absolute;
        width: 1px;
        height: 1px;
        padding: 0;
        margin: -1px;
        overflow: hidden;
        clip: rect(0, 0, 0, 0);
        border: 0;
    }

    .filupp {
        position: relative;
        background: #242424;
        display: block;
        padding: 1em;
        font-size: 1em;
        width: 100%;
        height: 3.5em;
        color: #fff;
        cursor: pointer;
        box-shadow: 0 1px 3px #0b0b0b;
    }

    .filupp:before {
        content: "";
        position: absolute;
        top: 1.5em;
        right: 0.75em;
        width: 2em;
        height: 1.25em;
        border: 3px solid #dd4040;
        border-top: 0;
        text-align: center;
    }

    .filupp:after {
        content: "➜";
        -webkit-transform: rotate(-90deg);
        -moz-transform: rotate(-90deg);
        -ms-transform: rotate(-90deg);
        -o-transform: rotate(-90deg);
        transform: rotate(-90deg);
        position: absolute;
        top: 0.65em;
        right: 0.45em;
        font-size: 2em;
        color: #dd4040;
        line-height: 0;
    }

    .filupp-file-name {
        width: 75%;
        display: inline-block;
        max-width: 100%;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        word-wrap: normal;
    }

    @import url('https://fonts.googleapis.com/css?family=Source+Code+Pro:200,900');

    :root {
        --text-color: hsla(210, 50%, 85%, 1);
        --shadow-color: hsla(210, 40%, 52%, .4);
        --btn-color: hsl(210, 80%, 42%);
        --bg-color: #141218;
    }

    * {
        box-sizing: border-box;
    }

    /* html,
    body {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: var(--bg-color);
    } */

    button {
        position: relative;
        padding: 10px 20px;
        border: none;
        background: none;
        cursor: pointer;

        font-family: "Source Code Pro";
        font-weight: 900;
        text-transform: uppercase;
        font-size: 30px;
        color: var(--text-color);

        background-color: var(--btn-color);
        box-shadow: var(--shadow-color) 2px 2px 22px;
        border-radius: 4px;
        z-index: 0;
        overflow: hidden;
    }

    button:focus {
        outline-color: transparent;
        box-shadow: var(--btn-color) 2px 2px 22px;
    }

    .right::after,
    button::after {
        content: var(--content);
        display: block;
        position: absolute;
        white-space: nowrap;
        padding: 40px 40px;
        pointer-events: none;
    }

    button::after {
        font-weight: 200;
        top: -30px;
        left: -20px;
    }

    .right,
    .left {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
    }

    .right {
        left: 66%;
    }

    .left {
        right: 66%;
    }

    .right::after {
        top: -30px;
        left: calc(-66% - 20px);

        background-color: var(--bg-color);
        color: transparent;
        transition: transform .4s ease-out;
        transform: translate(0, -90%) rotate(0deg)
    }

    button:hover .right::after {
        transform: translate(0, -47%) rotate(0deg)
    }

    button .right:hover::after {
        transform: translate(0, -50%) rotate(-7deg)
    }

    button .left:hover~.right::after {
        transform: translate(0, -50%) rotate(7deg)
    }

    /* bubbles */
    button::before {
        content: '';
        pointer-events: none;
        opacity: .6;
        background:
            radial-gradient(circle at 20% 35%, transparent 0, transparent 2px, var(--text-color) 3px, var(--text-color) 4px, transparent 4px),
            radial-gradient(circle at 75% 44%, transparent 0, transparent 2px, var(--text-color) 3px, var(--text-color) 4px, transparent 4px),
            radial-gradient(circle at 46% 52%, transparent 0, transparent 4px, var(--text-color) 5px, var(--text-color) 6px, transparent 6px);

        width: 100%;
        height: 300%;
        top: 0;
        left: 0;
        position: absolute;
        animation: bubbles 5s linear infinite both;
    }

    @keyframes bubbles {
        from {
            transform: translate();
        }

        to {
            transform: translate(0, -66.666%);
        }
    }

    select {
        -webkit-appearance: none;
        -moz-appearance: none;
        -ms-appearance: none;
        appearance: none;
        outline: 0;
        box-shadow: none;
        border: 0 !important;
        background: #5c6664;
        background-image: none;
        flex: 1;
        padding: 0 .5em;
        color: #fff;
        cursor: pointer;
        font-size: 1em;
        font-family: 'Open Sans', sans-serif;
    }

    select::-ms-expand {
        display: none;
    }

    .select {
        position: relative;
        display: flex;
        width: 20em;
        height: 3em;
        line-height: 3;
        background: #5c6664;
        overflow: hidden;
        border-radius: .25em;
    }

    .select::after {
        content: '\25BC';
        position: absolute;
        top: 0;
        
        right: 0;
        padding: 0 1em;
        background: #2b2e2e;
        cursor: pointer;
        pointer-events: none;
        transition: .25s all ease;
    }

    .select:hover::after {
        color: #23b499;
    }

</style>
<body>
{{-- {{ dd($post) }} --}}

<form method="POST" enctype="multipart/form-data" id="fileUploadForm">
    @csrf
    <div class="select" style="margin: 10px -85px;">
        <select name="id_post" id="format">
            <option selected disabled>Pilih Post</option>
            @foreach ($post as $p)
                <option value="{{ $p['id']}}">{{ Str::limit($p['title'], 10, '...') }}</option>
            @endforeach
        </select>
    </div>

    <input type="text" name="comment_post" placeholder="comment post"/><br/><br/>
    {{-- <label for="custom-file-upload" class="filupp">
        <span class="filupp-file-name js-value">Browse Files</span>
        <input type="file" name="files" id="custom-file-upload"/>
    </label> --}}
    {{-- <input type="submit" value="Submit" id="btnSubmit"/> --}}
    <button style="--content: 'Kirim'; margin: 10px 0;" id="btnSubmit">
        <div class="left"></div>
            Kirim
        <div class="right"></div>
    </button>   
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script>
    $(document).ready(function () {

        // get the name of uploaded file
        $('input[type="file"]').change(function(){
            var value = $("input[type='file']").val();
            $('.js-value').text(value);
        });


        $("#btnSubmit").click(function (event) {

            //stop submit the form, we will post it manually.
            event.preventDefault();

            // Get form
            var form = $('#fileUploadForm')[0];

            // Create an FormData object
            var data = new FormData(form);

            // If you want to add an extra field for the FormData
            // data.append("CustomField", "This is some extra data, testing");

            // disabled the submit button
            $("#btnSubmit").prop("disabled", true);

            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: "/polymorphic",
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 6000000,
                success: function (data) {
                    console.log(data);
                    alert('berhasil kirim komen..jika mau kirim lagi refresh halaman...');

                },
                error: function (e) {
                    alert('error');
                }
            });

        });

    });
</script>
</body>
</html>