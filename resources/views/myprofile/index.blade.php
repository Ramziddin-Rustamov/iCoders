@extends('layouts.app')
@section('title', 'My profile')
@section('content')
 <div class="page-content page-container " id="page-content" style="padding-top:125px;">
    <div class="padding">
        <div class="row  d-flex justify-content-center">
            <div class="col-xl-6 col-md-12">
                <div class="card user-card-full">
                    <div class="row m-l-0 m-r-0">
                        <div class="col-sm-4 bg-c-lite-green user-profile">
                            <div class="card-block text-center text-white">
                                <div class="m-b-25">
                                    <a href="{{ asset($user->image) }}">
                                    <img class="img-account-profile rounded-circle mb-2" style="width: 102px; height: 100px; object-fit: cover" src="{{ asset($user->image) }}" alt="{{ $user->name }}`image">
                                    </a>
                                </div>
                                <h6 class="f-w-600">{{ $user->name }}</h6>
                                <p>{{ ($user->job ) ?? 'No Job yet' }}</p> <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="card-block">
                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">{{ __('Information') }}</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">{{ __('Email') }}</p>
                                        <h6 class="text-muted f-w-400">{{ $user->email  }}</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">{{ __('Phone') }}</p>
                                        <h6 class="text-muted f-w-400">{{ $user->phone ?? 'Update phone' }}</h6>
                                    </div>
                                </div>
                                <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">{{ __('About') }}</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">{{ __('Profession') }}</p>
                                        <h6 class="text-muted f-w-400">{{ $user->job ??'Update job' }}</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">{{ __('Location') }}</p>
                                        <h6 class="text-muted f-w-400">{{ $user->location ?? 'Update location' }}</h6>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <ul class="social-link list-unstyled m-t-40 m-b-10">
                                        <li><a  title="linkedin" href="{{$user->linkedin }}" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="facebook" data-abc="true"><i class="bi bi-linkedin" aria-hidden="true"></i></a></li>
                                        <li><a title="telegram" href="{{ $user->telegram }}" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="twitter" data-abc="true"><i class="bi bi-telegram" aria-hidden="true"></i></a></li>
                                        <li><a title="instagram" href="{{ $user->instagram }}" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="instagram" data-abc="true"><i class="bi bi-instagram" aria-hidden="true"></i></a></li>
                                        <li><a title="github" href="{{ $user->github }}"    data-toggle="tooltip" data-placement="bottom" title="" data-original-title="instagram" data-abc="true"><i class="bi bi-github" aria-hidden="true"></i></a></li>
                                    </ul>
                                    <ul class="social-link list-unstyled m-t-40 m-b-10" >
                                        <li><a  href="{{ route('profile.edit',['id' =>$user->id]) }}" title="Edit"><i class="bi bi-pen" ></i></a></li>                                       
                                        <li><a href="{{ route('profile.show',['id' =>$user->id]) }}" title="Public view"><i class="bi bi-eye" ></i></a></li>                                       
                                    </ul>            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             @if ($user->about_uz ||$user->telegram ||$user->instagram ||$user->linkedin )
                <div class="col-xl-6 col-md-12">
                    <div class="card user-card-full">
                        <div class="row m-l-0 m-r-0">
                            <div class="col-sm-12">
                                <div class="card-block">
                                    <h6 class="m-b-20 p-b-5 b-b-default f-w-600">{{ __('About Yourself') }}</h6>
                                    <div class="row">
                                        @if ($user->about_uz)
                                        <div class="col-sm-12">
                                            <p class="m-b-10 f-w-600">{{ __('About yourself') }}</p>
                                            <h6 class="text-muted f-w-600"> {{ substr(strip_tags($user->about_uz), 0, 500) }}
                                                {{ strlen(strip_tags($user->about_uz)) > 50 ? ".." : "" }}</h6>
                                           
                                            <hr>
                                        </div>
                                        @endif
                                        @if ($user->telegram )
                                        <div class="col-sm-12">
                                            <p class="m-b-10 f-w-600">{{ __('Telegram Account') }}</p>
                                            <h6 class="text-muted f-w-400">{{ $user->telegram }}</h6>
                                        </div>
                                        @endif
                                        @if ($user->instagram)
                                        <div class="col-sm-12">
                                            <p class="m-b-10 f-w-600">{{ __('Instagram Account') }}</p>
                                            <h6 class="text-muted f-w-400">{{ $user->instagram }}</h6>
                                        </div>
                                        @endif
                                        @if ($user->linkedin)
                                        <div class="col-sm-12">
                                            <p class="m-b-10 f-w-600">{{ __('Linkedin') }}</p>
                                            <h6 class="text-muted f-w-400">{{ $user->linkedin }}</h6>
                                        </div>
                                        @endif
                                    </div>                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             @endif
        </div>
    </div>
</div>
@endsection