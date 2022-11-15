package com.example.myintentapp;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.net.Uri;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

public class MainActivity extends AppCompatActivity implements View.OnClickListener{

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        Button btnMoveActivity = findViewById(R.id.btn_move_activity);
        btnMoveActivity.setOnClickListener(this);

        Button btnMoveWithDataActivity = findViewById(R.id.btn_move_activity_data);
        btnMoveWithDataActivity.setOnClickListener(this);

        Button btnDialPhone = findViewById(R.id.btn_dial_number);
        btnDialPhone.setOnClickListener(this);
    }

    @Override
    public void onClick(View v) {
        switch (v.getId()) {
            // Ketika Button btnMoveActivity (R.id.btn_move_activity) maka akan menjalankan intent. Intent ini berfungsi untuk berpindah dari MainActivity ke MoveActivity dan tidak mengirimkan data apapun
            case R.id.btn_move_activity:
                Intent moveIntent = new Intent(MainActivity.this, MoveActivity.class);
                startActivity(moveIntent);
                break;
            // Ketika Button btnMoveWithDataActivity (R.id.btn_move_activity_data) maka akan menjalankan intent. Intent ini berfungsi untuk berpindah dari MainActivity ke MoveWithDataActivity dan mengirimkan data berupa nama dan umur
            case R.id.btn_move_activity_data:
                Intent moveWithDataIntent = new Intent(MainActivity.this, MoveWithDataActivity.class);
                moveWithDataIntent.putExtra(MoveWithDataActivity.EXTRA_NAME, " Praktikum PBP Go Brrrrr");
                moveWithDataIntent.putExtra(MoveWithDataActivity.EXTRA_AGE, 5);
                startActivity(moveWithDataIntent);
                break;
            // Ketika Button btnDialPhone (R.id.btn_dial_number) maka akan menjalankan intent. Intent ini berfungsi untuk berpindah dari MainActivity ke aplikasi telepon dan mengirimkan data berupa nomor telepon
            case R.id.btn_dial_number:
                String phoneNumber = "082122255122";
                Intent dialPhoneIntent = new Intent(Intent.ACTION_DIAL, Uri.parse("tel:"+phoneNumber));
                startActivity(dialPhoneIntent);
                break;
        }
    }
}


