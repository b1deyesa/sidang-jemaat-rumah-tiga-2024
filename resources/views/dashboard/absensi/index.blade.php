<x-layout.dashboard title="Absensi">
    <div id="reader" width="600px"></div>
    
    <form id='form' action="{{ route('peserta.absensi') }}" method="POST">
        @csrf
        <input type="text" name="peserta" id="result">
    </form>
    
    <script>
        function onScanSuccess(decodedText, decodedResult) {
            $('#result').val(decodedText)
            $('#form').submit();
        }

        function onScanFailure(error) {
            console.warn(`Code scan error = ${error}`);
        }

        let html5QrcodeScanner = new Html5QrcodeScanner("reader", { 
            fps: 10, 
            qrbox: { 
                width: 400, height: 400
            } 
        }, false);

        html5QrcodeScanner.render(onScanSuccess, onScanFailure);
    </script>
</x-layout.dashboard>
