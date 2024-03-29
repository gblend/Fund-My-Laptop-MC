@extends('layout.app')

@push('styles')
    <link rel="stylesheet" href="{{asset('css/custom-css/investee-create-campaign.css')}}">
@endpush


@section('content')

    <main class="container-fluid px-0">
    <div class="top">
      <ol class="breadcrumb" style="font-size: 23px; background:none;">
        <li class="breadcrumb-item"><a style="color: black; " href="#">Main Dashboard</a></li>
        <li class="breadcrumb-item active "><a style="color: blue;" href="#">Edit Campaign</a></li>
      </ol>
    </div>
        <div class="top-image">
            <p class="top-image__text"></p>
        </div>
        <section class="back-wrap">
            <div class="row container-fluid mx-auto main-wrap">
                <div class="col contact--wrap container-fluid">
                <div class="contact--wrap-1">
                    <h2>Campaign Tip</h2>
                </div>

                    <div class="contact--wrap-2">
                        <div class="py-2 contact-item d-flex align-items-center mb-4 p-2">
                    <p>By creating a campaign you stand a chance of getting funding for a brand new laptop or get the existing one repaired. <br>
                    A properly crafted campaign usually increases your chances of getting funds by 70%.
                    </p>
                        </div>
                    </div>
                </div>
                <div class="col px-0">
                    <div class="container px-0 form--wrap">
                        <div class="form--case">
                            <div>
                                <p class="contact-item__title">Edit Campaign</p>
                                <span class="contact-item__num">Fill this form appropriately with verifiable information for an opportunity to get your laptop expenditure funded.</span>
                            </div>
                            @if(session('edit_success'))
                                <div class="alert alert-success mt-4">{{ session('edit_success') }}</div>
                            @elseif(session('edit_error'))
                                <div class="alert alert-danger mt-4">{{ session('edit_error') }}</div>
                            @endif
                            <form class="form-field pt-4" method="post" action="{{ url('/campaigns/'.$edit_campaign->id) }}">
                                @method('PATCH')
                                @csrf
                                <div class="row m-0 d-flex justify-content-between">
                                    <div class="form-group form-item--input">
                                        <label for="exampleFormControlInput1">Title</label>
                                        <input type="text" name="title" class="contact-item__num py-4 form-control @error('title') is-invalid @enderror" id="exampleFormControlInput1" placeholder="Enter campaign title" value="{{ $edit_campaign->title }}">
                                        <span class="text-danger">@error('title') {{ $message }} @enderror</span>
                                    </div>
                                    <div class="form-group form-item--input">
                                        <label for="exampleFormControlInput1">Amount</label>
                                        <input type="number" name="amount" class="contact-item__num py-4 form-control @error('amount') is-invalid @enderror" id="exampleFormControlInput1" placeholder="Enter amount" value="{{ $edit_campaign->amount }}">
                                        <span class="text-danger">@error('amount') {{ $message }} @enderror</span>
                                    </div>
                                </div>
                                <div class="row m-0 d-flex justify-content-between">
                                    <div class="form-group form-item--input">
                                        <label for="exampleFormControlInput1">Currency</label>
                                        <input type="text" name="currency" class="contact-item__num py-4 form-control" id="exampleFormControlInput1" value="NGN (&#x20a6;)" disabled>
                                    </div>
                                    <div class="form-group form-item--input">
                                        <label for="exampleFormControlInput1">Photo URL</label>
                                        <input type="url" name="photo_URL" class="contact-item__num py-4 form-control @error('photo_URL') is-invalid @enderror" id="exampleFormControlInput1" placeholder="Enter photo url" value="{{ $edit_campaign->photoURL }}">
                                        <span class="text-danger">@error('photo_URL') {{ $message }} @enderror</span>
                                    </div>
                                </div>
                                <div class="form-group w-100">
                                    <label for="exampleFormControlTextarea1">Description</label>
                                    <textarea name="description" class="pt-3 form-item--text-area contact-item__num form-control @error('description') is-invalid @enderror" id="exampleFormControlTextarea1" rows="" placeholder="Why should people invest in this cause?">{{ $edit_campaign->description }}</textarea>
                                    <span class="text-danger">@error('description') {{ $message }} @enderror</span>
                                </div>
                                <button class="form-submit" type="submit">Update Campaign</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection
