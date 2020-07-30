<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
        {{-- {{ dd($notif) }} --}}
        <table class="table container">
                <caption>List of users</caption>
                <thead>
                  <tr class="row">
                    <th class="col-md-1">#</th>
                    <th class="col-md-9">Pemberitahuan</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($notif as $n)
                    @php
                        $notifby = substr($n['type'], 18);
                        $read = $n['read_at'];
                        if($notifby == 'CommentNotif') {
                            $notifby = 'komen';
                        } else {
                            $notifby = 'post';
                        }

                        if($read == null)
                        {
                            $read = 'background-color: rgba(255, 0, 0, 0.198);';
                        } else
                        {
                            $read = '';
                        }

                        // $data = json_decode($n['data']);
                        // $data = $data->data->body;
                    @endphp
                        <tr class="row" style="{{ $read }}">    
                            <td class="col-md-1">{{ $loop->iteration }}</td>
                                <td class="col-md-9"><a href="/read/{{ $n['id_notif'] }}" style="text-decoration: none;">ada {{ $notifby }} baru untuk kamu. cek sekarang...</a></td>
                        </tr>
                @endforeach
                </tbody>
              </table>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>