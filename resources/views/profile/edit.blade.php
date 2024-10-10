@extends('layouts.meal_header')

@section('content')
    <div class="container">
        <!-- Profile Information Form -->
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="profile-card mb-4">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>
        </div>

        <!-- Delete Account Form -->
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="profile-card">
                    <h4>Accountni O'chirish . </h4>
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.getElementById('open-modal-btn').addEventListener('click', function() {
            document.getElementById('confirm-deletion-modal').classList.remove('hidden');
        });

        document.getElementById('close-modal-btn').addEventListener('click', function() {
            document.getElementById('confirm-deletion-modal').classList.add('hidden');
        });
    </script>
@endsection



