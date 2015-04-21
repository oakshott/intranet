@if (Session::has('flash_notification.message'))
    @if (Session::has('flash_notification.overlay'))
        @include('flash::modal', ['modalClass' => 'flash-modal', 'title' => Session::get('flash_notification.title'), 'body' => Session::get('flash_notification.message')])
    @else
        <div data-alert id="alert" class="alert-box {{ Session::get('flash_notification.level') }}">
            <a href="#" class="close">&times;</a>

            {{ Session::get('flash_notification.message') }}
        </div>
    @endif
@endif
