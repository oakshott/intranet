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
				<div class="panel-heading"><h3>Cover</h3></div>
				<iframe  name="Covers" src="http://mike-pc:8000/messages/cover.htm" frameborder="0" scrolling="no" id="iframe" onload='javascript:resizeIframe(this);' />
				</div>
			</div>
		</div>
	</div>
</div>
@endsection