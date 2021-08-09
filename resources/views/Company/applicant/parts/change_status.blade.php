<form class="form-inline " id="change_applicant_status" action="{{ route('myCompany.post.ApplicantStatus',['id' => $id,'post_id' => $post_id]) }}" method="post">
    @csrf
    <select class="form-control" name="status" style="width: 150px">
        <option value="" selected disabled>{{ t('Status') }}</option>
        <option {{ $status == 'review' ? 'selected' : '' }} value="review">{{ t('Review') }}</option>
        <option {{ $status == 'accepted' ? 'selected' : '' }} value="accepted">{{ t('Accepted') }}</option>
        <option {{ $status == 'canceled' ? 'selected' : '' }} value="canceled">{{ t('Canceled') }}</option>
    </select>
    <button type="submit" class="btn btn-success btn-sm font-weight-bold ml-4">{{ t('Chnage Status') }}</button>
</form>
