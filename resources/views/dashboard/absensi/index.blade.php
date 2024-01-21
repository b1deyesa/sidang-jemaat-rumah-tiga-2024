<x-layout.dashboard title="Absensi">
    <div id="reader"></div>
    
    <form id='form' action="{{ route('peserta.absensi') }}" method="POST">
        @csrf
        <input type="hidden" name="peserta" id="result">
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
                width: 200, height: 200
            } 
        }, false);

        html5QrcodeScanner.render(onScanSuccess, onScanFailure);
    </script>
</x-layout.dashboard>
