@extends('layouts.master')
@section('content')
<section class="row new-post">
    <div class="col-md-5 col-md-offset-3">
        <header><h3>What do you want to say</h3></header>
        <form action="">
            <div class="form-group">
                <textarea class="form-control" name="new-post" id="new-post" rows="5" placeholder="Tell us here">
                    
                </textarea>
                </div>
            <button type="submit" class="btn btn-primary">Post it!</button>
            </form>
    </div>
</section>