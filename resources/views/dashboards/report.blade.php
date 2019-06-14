@extends('layouts.app')

@section('content')
<section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h1 class="page-header text-center">
          <i class="fa fa-globe pull-left"></i>  Mamaland
            <small class="pull-right">{{ date('D d M, Y', time()) }}</small>
        </h1>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 col-md-offset-1 invoice-col">
        From
        <address>
          <strong>Mamaland</strong><br>
          P.O. Box 4747 - 00100,<br>
          Nairobi, KENYA.<br>
          Phone: +254702970057.<br>
          Phone: +254779172665.<br>
          Email: info@mamalamd.com
        </address>
      </div>
      {{-- <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        To
        <address>
          <strong>John Doe</strong><br>
          795 Folsom Ave, Suite 600<br>
          San Francisco, CA 94107<br>
          Phone: (555) 539-1037<br>
          Email: john.doe@example.com
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <b>Invoice #007612</b><br>
        <br>
        <b>Order ID:</b> 4F3S8J<br>
        <b>Payment Due:</b> 2/22/2014<br>
        <b>Account:</b> 968-34567
      </div> --}}
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
        <div class="text-center">
            <h3>Attraction Site Report</h3>
        </div>
      <div class="col-xs-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            <th>ID</th>
            <th>Site name</th>
            <th>Tourist name</th>
            <th>Nationality</th>
            <th>Amount Paid</th>
            <th>Status</th>
          </tr>
          </thead>
          <tbody>
                @if (count($site_record)>0)
                    @foreach ($site_record as $record)
                    <tr>
                            <td>{{ $record->id }}</td>
                            <td>{{ $record->site_name }}</td>
                            <td>{{ $record->user_name }}</td>
                            <td>{{ $record->nationality }}</td>
                            <td>{{ $record->amount }}</td>
                            <td>{{ $record->status }}</td>
                        </tr>
                    @endforeach
                @else
                    <div class="container-fluid text-center">
                        <div class="alert alert-warning">
                            <h5>No record Found</h5>
                        </div>
                    </div>
                @endif
          
          
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->


     <!-- Table row -->
     <div class="row">
            <div class="text-center">
                <h3>Hotels Report</h3>
            </div>
          <div class="col-xs-12 table-responsive">
            <table class="table table-striped">
              <thead>
              <tr>
                <th>ID</th>
                <th>Site name</th>
                <th>Tourist name</th>
                <th>Nationality</th>
                <th>Amount Paid</th>
                <th>Status</th>
              </tr>
              </thead>
              <tbody>
                    @if (count($hotel_record)>0)
                        @foreach ($hotel_record as $record)
                        <tr>
                                <td>{{ $record->id }}</td>
                                <td>{{ $record->site_name }}</td>
                                <td>{{ $record->user_name }}</td>
                                <td>{{ $record->nationality }}</td>
                                <td>{{ $record->amount }}</td>
                                <td>{{ $record->status }}</td>

                                
                            </tr>
                        @endforeach
                    @else
                        <div class="container-fluid text-center">
                            <div class="alert alert-warning">
                                <h5>No record Found</h5>
                            </div>
                        </div>
                    @endif
              
              
              </tbody>
            </table>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-xs-6">
        {{-- <p class="lead">Payment Methods:</p>
        <img src="../../dist/img/credit/visa.png" alt="Visa">
        <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
        <img src="../../dist/img/credit/american-express.png" alt="American Express">
        <img src="../../dist/img/credit/paypal2.png" alt="Paypal">

        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
          Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg
          dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
        </p> --}}
      </div>
      <!-- /.col -->
      <div class="col-xs-6">
        <p class="lead">Amount Due 2/22/2014</p>

        <div class="table-responsive">
          <table class="table">
            <tbody><tr>
              <th style="width:50%">Subtotal:</th>
              <td>$250.30</td>
            </tr>
            <tr>
              <th>Tax (9.3%)</th>
              <td>$10.34</td>
            </tr>
            
            <tr>
              <th>Total:</th>
              <td>$265.24</td>
            </tr>
          </tbody></table>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    
  </section>
@endsection