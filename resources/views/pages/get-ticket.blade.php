@extends('layouts.single-page')
@section('content')
    <section class="container get-ticket-registration">
        <form class="card" action="">
            <div class="card-body">
                <div class="form-group">
                    <label for="">Name</label>
                    <input name="name" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Phone Number</label>
                    <input name="phone" type="text" class="form-control">
                </div>

                <div>
                    <button class="btn btn-text" type="reset">Reset</button>
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </section>