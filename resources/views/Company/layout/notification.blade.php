

<style>
    .alert_error{
        background-color:#e43b62;
        color:white;
        font-size: 17px
    }
    .error_content{
        padding: 20px
    }
</style>
@if ($errors->count() > 0)
    @foreach ($errors->all() as $error)
        <div class="alert alert-dismissible fade show alert_error"  role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <strong  class="error_content">{{ t('Notification') }} :  {{ $error }} </strong>
        </div>
    @endforeach
@endif


