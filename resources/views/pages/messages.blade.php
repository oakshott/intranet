@extends('welcome')
@section('content')
<script language="javascript" type="text/javascript">
  function resizeIframe(obj) {
    obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
  }
</script>
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading"><h3>Daily Messages</h3></div>
				<iframe name="Messages" src="http://mike-pc:8000/messages/messages.htm" frameborder="0" scrolling="no" id="iframe" onload='javascript:resizeIframe(this);' />
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

