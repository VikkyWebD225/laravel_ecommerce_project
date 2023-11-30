<select id="country">
    <option value="">Select Country</option>
    @foreach($countries as $country)
        <option value="{{$country->id}}">{{$country->name}}</option>
    @endforeach
</select>

<select id="state">
    <option value="">Select State</option>
</select>

<select id="city">
    <option value="">Select City</option>
</select>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        $('#country').change(function() {
            let cid = $(this).val();
            $.ajax({
                url: 'getState',
                type: 'post',
                data: {
                    'cid': cid,
                    '_token': '{{ csrf_token() }}'
                },
                success: function(result) {
                    var html = '';
                    

                    // Clear old options in the "state" dropdown
                    $("#state").html('');
                    for (var key in result) {
        if (result.hasOwnProperty(key)) {
            var id = key;
            var name = result[key];

            html += '<option value="' + id + '">' + name + '</option>';
            console.log(name);
        }
    }
                   // console.log(html+"SAWAN");

                    // Populate the "state" dropdown with new options
                    $("#state").html(html);

                
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });

       

                        
    });

    $(document).ready(function() {
        $('#state').change(function() {
            let sid = $(this).val();
            $.ajax({
                url: 'getCity',
                type: 'post',
                data: {
                    'sid': sid,
                    '_token': '{{ csrf_token() }}'
                },
                success: function(result) {
                    var html = '';
                    

                    // Clear old options in the "state" dropdown
                    $("#city").html('');
                    for (var key in result) {
        if (result.hasOwnProperty(key)) {
            var id = key;
            var name = result[key];

            html += '<option value="' + id + '">' + name + '</option>';
            console.log(name);
        }
    }
                   // console.log(html+"SAWAN");

                    // Populate the "state" dropdown with new options
                    $("#city").html(html);

                
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });

       

                        
    });


</script>

