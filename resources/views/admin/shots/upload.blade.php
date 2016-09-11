@extends('layouts.template.admin.page-with-aside')
@section('pagetitle', 'Upload new shots')
@section('bg', 'grey60')

    @section('page_styles')
    <link href="{{ theme('vendor/jquery-file-upload/blueimp-gallery/blueimp-gallery.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{ theme('vendor/jquery-file-upload/css/jquery.fileupload.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{ theme('vendor/jquery-file-upload/css/jquery.fileupload-ui.css')}}" rel="stylesheet" type="text/css"/>
    @endsection

@section('main')

	  @include('partials.breadcrump')
			<!-- Page Content begins here -->
	<div class="row p1-Container clearfix">

   		<div class="mdl-cell mdl-cell--12-col mt-card">
        <div style="height:3em"></div>
          <!-- The file upload form used as target for the file upload widget -->
    <form id="fileupload" action="{{route('admin.shots.store')}}" method="POST" enctype="multipart/form-data">
      <input type="hidden" class="hidden" name="_token" value="{{ csrf_token() }}">
        <!-- Redirect browsers with JavaScript disabled to the origin page -->
        <noscript><input type="hidden" name="redirect" value=""></noscript>
        <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
        <div class="row clearfix fileupload-buttonbar upload-form-actions-wrapper">
            <div class="p1-Container upload-form-actions mdl-cell mdl-cell--12-col">
                <!-- The fileinput-button span is used to style the file input field as button -->
                <span class="btn fileinput-button">
                    <i class="mdi mdi-plus-circle-outline"></i>
                    <span>Add files...</span>
                    <input type="file" name="files[]" multiple>
                </span>
                <button type="submit" class="btn blue mdl-button float start">
                    <i class="mdi mdi-upload"></i>
                    <span>Start upload</span>
                </button>
                <button type="reset" class="btn mdl-button float cancel">
                    <i class="mdi mdi-close-circle"></i>
                    <span>Cancel upload</span>
                </button>
<!--                 <button type="button" class="btn danger mdl-button float delete">
                    <i class="mdi mdi-delete"></i>
                    <span>Delete</span>
                </button> -->
               <!--  <input type="checkbox" class="toggle"> -->
                <!-- The global file processing state -->
                <span class="fileupload-process"></span>
            </div>
            <!-- The global progress state -->
            <div class="col-lg-5 fileupload-progress fade">
                <!-- The global progress bar -->
                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                </div>
                <!-- The extended global progress state -->
                <div class="progress-extended">&nbsp;</div>
            </div>
        </div>
        <!-- The table listing the files available for upload/download -->
        <table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
    </form>
    <br>
</div>
<!-- The blueimp Gallery widget -->
<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-filter=":even">
    <div class="slides"></div>
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
</div>
</div>


<!-- The template to display files available for upload -->
<script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
        <td>
            <span class="preview"></span>
        </td>
        <td>
            <p class="name">{%=file.name%}</p>
            <strong class="error text-danger"></strong>
        </td>
        <td>
            <p class="size">Processing...</p>
            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
        </td>
        <td>
            {% if (!i && !o.options.autoUpload) { %}
                <button class="btn btn-primary start" disabled>
                    <i class="glyphicon glyphicon-upload"></i>
                    <span>Start</span>
                </button>
            {% } %}
            {% if (!i) { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade">
        <td>
            <span class="preview">
                {% if (file.thumbnailUrl) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                {% } %}
            </span>
        </td>
        <td>
            <p class="name">
                {% if (file.url) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                {% } else { %}
                    <span>{%=file.name%}</span>
                {% } %}
            </p>
            {% if (file.error) { %}
                <div><span class="label label-danger">Error</span> {%=file.error%}</div>
            {% } %}
        </td>
        <td>
            <span class="size">{%=o.formatFileSize(file.size)%}</span>
        </td>
        <td>
            {% if (file.deleteUrl) { %}
                <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                    <i class="glyphicon glyphicon-trash"></i>
                    <span>Delete</span>
                </button>
                <input type="checkbox" name="delete" value="1" class="toggle">
            {% } else { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>

<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
        {% for (var i=0, file; file=o.files[i]; i++) { %}
            <tr class="template-download fade">
                <td>
                    <span class="preview">
                        {% if (file.thumbnailUrl) { %}
                            <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                        {% } %}
                    </span>
                </td>
                <td>
                    <p class="name">
                        {% if (file.url) { %}
                            <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                        {% } else { %}
                            <span>{%=file.name%}</span>
                        {% } %}
                    </p>
                    {% if (file.error) { %}
                        <div><span class="label label-danger">Error</span> {%=file.error%}</div>
                    {% } %}
                </td>
                <td>
                    <span class="size">{%=o.formatFileSize(file.size)%}</span>
                </td>
                <td>
                    {% if (file.deleteUrl) { %}
<!--                         <button class="btn red delete btn-sm" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                            <i class="fa fa-trash-o"></i>
                            <span>Delete</span>
                        </button>
                        <input type="checkbox" name="delete" value="1" class="toggle"> -->
                    {% } else { %}
                        <button class="btn yellow cancel btn-sm">
                            <i class="fa fa-ban"></i>
                            <span>Cancel</span>
                        </button>
                    {% } %}
                </td>
            </tr>
        {% } %}
</script>			<!-- END PAGE BASE CONTENT -->
@endsection
@section('page_scripts')

<!-- BEGIN PAGE LEVEL PLUGINS -->
                  <script src="{{ theme('vendor/jquery-file-upload/js/vendor/jquery.ui.widget.js')}}" type="text/javascript"></script>
  <script src="{{ theme('vendor/jquery-file-upload/js/vendor/tmpl.min.js')}}" type="text/javascript"></script>
  <script src="{{ theme('vendor/jquery-file-upload/js/vendor/load-image.min.js')}}" type="text/javascript"></script>
  <script src="{{ theme('vendor/jquery-file-upload/js/vendor/canvas-to-blob.min.js')}}" type="text/javascript"></script>
  <script src="{{ theme('vendor/jquery-file-upload/blueimp-gallery/jquery.blueimp-gallery.min.js')}}" type="text/javascript"></script>
  <script src="{{ theme('vendor/jquery-file-upload/js/jquery.iframe-transport.js')}}" type="text/javascript"></script>
  <script src="{{ theme('vendor/jquery-file-upload/js/jquery.fileupload.js')}}" type="text/javascript"></script>
  <script src="{{ theme('vendor/jquery-file-upload/js/jquery.fileupload-process.js')}}" type="text/javascript"></script>
  <script src="{{ theme('vendor/jquery-file-upload/js/jquery.fileupload-image.js')}}" type="text/javascript"></script>
  <script src="{{ theme('vendor/jquery-file-upload/js/jquery.fileupload-audio.js')}}" type="text/javascript"></script>
  <script src="{{ theme('vendor/jquery-file-upload/js/jquery.fileupload-video.js')}}" type="text/javascript"></script>
  <script src="{{ theme('vendor/jquery-file-upload/js/jquery.fileupload-validate.js')}}" type="text/javascript"></script>
  <script src="{{ theme('vendor/jquery-file-upload/js/jquery.fileupload-ui.js')}}" type="text/javascript"></script>

  <!-- END PAGE LEVEL PLUGINS -->
      <script src="{{ theme('js/modules/form-fileupload.js')}}" type="text/javascript"></script>

@endsection