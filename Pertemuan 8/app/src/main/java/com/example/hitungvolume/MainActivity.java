// Menggunakan package com.example.hitungvolume
package com.example.hitungvolume;

// Mengimport library yang dibutuhkan
import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

// Library android.os.Bundle digunakan untuk  menyertakan semua kode dan resource serta menggabungkannya menjadi satu.
import android.os.Bundle;
// Library android.view.View digunakan untuk mengatur tampilan aplikasi.
import android.view.View;
// Library android.widget.Button digunakan untuk interaksi widget button.
import android.widget.Button;
// Library android.widget.EditText digunakan untuk interaksi widget edit text.
import android.widget.EditText;
// Library android.widget.TextView digunakan untuk interaksi widget text view.
import android.widget.TextView;

// Membuat class MainActivity yang mengimplementasikan OnClickListener
public class MainActivity extends AppCompatActivity implements View.OnClickListener {
    // Membuat deklarasi variabel dengan tipe data TextView, EditText, dan Button
    private final String KEY_RESULT = "key_result";
    private TextView tvResult;
    private EditText etWidth;
    private EditText etLength;
    private EditText etHeight;

    // Membuat method onCreate
    // Method onCreate akan dieksekusi pertama kali ketika aplikasi dijalankan
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        // super.onCreate(savedInstanceState) digunakan untuk memanggil method onCreate pada superclass
        super.onCreate(savedInstanceState);
        // setContentView digunakan untuk menampilkan layout activity_main.xml
        setContentView(R.layout.activity_main);

        // Menghubungkan variabel dengan komponen pada layout
        tvResult = findViewById(R.id.tv_result);
        etWidth = findViewById(R.id.et_width);
        etLength = findViewById(R.id.et_length);
        etHeight = findViewById(R.id.et_height);
        Button btnCalculate = findViewById(R.id.btn_calculate);
        btnCalculate.setOnClickListener(this);

        // Mengecek apakah savedInstanceState tidak null
        // Jika tidak null, maka akan mengambil nilai dari KEY_RESULT
        // dan menampilkannya pada TextView tvResult
        if (savedInstanceState != null) {
            String result = savedInstanceState.getString(KEY_RESULT);
            tvResult.setText(result);
        }
    }

    // Perintah hanya akan dieksekusi jika btn_calculate ditekan
    @Override
    public void onClick(View view) {
        // Ambil nilai yang diberikan pengguna pada seluruh EditText
        String inputLength = etLength.getText().toString().trim();
        String inputWidth = etWidth.getText().toString().trim();
        String inputHeight = etHeight.getText().toString().trim();

        // Validasi
        boolean isEmptyFields = false;

        // Mengecek apakah inputLength kosong
        if (inputLength.isEmpty()) {
            isEmptyFields = true;
            etLength.setError("Field ini tidak boleh kosong");
        }
        // Mengecek apakah inputWidth kosong
        if (inputWidth.isEmpty()) {
            isEmptyFields = true;
            etWidth.setError("Field ini tidak boleh kosong");
        }
        // Mengecek apakah inputHeight kosong
        if (inputHeight.isEmpty()) {
            isEmptyFields = true;
            etHeight.setError("Field ini tidak boleh kosong");
        }

        // Jika tidak ada field yang kosong, maka akan menghitung volume
        if (view.getId() == R.id.btn_calculate) {
            // Mengecek apakah isEmptyFields bernilai false
            if (!isEmptyFields) {
                // Hitung volume balok
                double volume = Double.parseDouble(inputLength) *
                        Double.parseDouble(inputWidth) *
                        Double.parseDouble(inputHeight);

                // Tampilkan hasil perhitungan ke TextView -> tvResult
                tvResult.setText(String.format("Volume: %s", volume));
            }
        }
    }

    // Membuat method onSaveInstanceState
    // Method ini akan dipanggil ketika activity sedang dihentikan
    @Override
    protected void onSaveInstanceState(@NonNull Bundle outState) {
        // Memanggil method onSaveInstanceState dari superclass
        super.onSaveInstanceState(outState);
        // Menyimpan nilai dari TextView tvResult ke KEY_RESULT
        String calculationResult = tvResult.getText().toString();
        outState.putString(KEY_RESULT, calculationResult);
    }

}