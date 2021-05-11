
@extends('User.layout.index')
@section('content')

    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label font-weight-bolder text-dark">{{ t('Popular posts') }}</span>
                    </h3>
                </div>
                <div  class="col-md-4"></div>
                <div  class="col-md-4">
                    <form action="{{ route('me.post.search') }}" method="get">
                        <div  style="display: inline-flex;width:380px" class="form-group">
                            <input name="search" class="form-control" type="text" placeholder="{{ t('Search') }}">
                            <button type="submit" class="btn btn-icon btn-sm btn btn-outline-dark ml-2" class="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </form>

                </div>
            </div>

            @if (isset($posts) && $posts->count() > 0)
                @foreach ($posts as $post)
                    <div class="card card-custom mb-8" style="border-radius: 10px">
                        <div class="card-header border-2" >
                            <h3 class="card-title">
                                <span class="card-label font-weight-bolder text-dark">{{ $post->title }}</span>
                            </h3>
                            <h6 class="card-title" >
                                <span class="card-label" style="font-size: 15px">{{ t('Expire Date') }}</span>
                                <span class="card-label" style="font-size: 15px">{{ $post->expire_date->format('Y-m-d') }}</span>
                            </h6>

                        </div>
                        <div class="card-body pt-0 pb-3 m-4">
                            <p>{!! $post->description !!}</p>
                            <div class="mt-4">
                                @if ($post->skills && $post->skills->count() > 0)
                                    @foreach ($post->skills as $skill)
                                        <span class="badge badge-secondary mt-3">{{ $skill->name }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="card-body pt-0 pb-3 m-4">
                            <div class="mt-4 text-right">
                                <button class="btn btn-secondary mr-2">{{ t('More Details') }}</button>
                                <button class="btn btn-primary">{{ t('Apply Now') }}</button>
                            </div>
                        </div>
                    </div>
                @endforeach

            @endif

            @if ($posts->count() > 5)
                <div class="card card-custom mb-8 text-center" style="border-radius: 10px">
                    <div class="d-flex justify-content-center p-5">
                        @if ($posts->lastPage() > 1)
                            <li class="btn  btn-light {{ ($posts->currentPage() == 1) ? ' disabled' : '' }}">
                                <a  href="{{ $posts->url(1) }}">{{ t('Previous') }}</a>
                            </li>
                            @for ($i = 1; $i <= $posts->lastPage(); $i++)
                                <a href="{{ $posts->url($i) }}" class="btn btn-icon btn-sm border-0 btn-light mr-2 my-1 {{ ($posts->currentPage() == $i) ? ' active' : '' }}">{{ $i }}</a>

                            @endfor
                            <li class="btn  btn-light {{ ($posts->currentPage() == $posts->lastPage()) ? ' disabled' : '' }}">
                                <a  href="{{ $posts->url($posts->currentPage()+1) }}">{{ t('Next') }}</a>
                            </li>

                        @endif
                    </div>
                </div>
            @endif



        </div>

    </div>






@endsection
