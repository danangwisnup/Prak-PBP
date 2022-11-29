package com.example.aplikasifirebase;

import androidx.appcompat.app.AppCompatActivity;
import androidx.cardview.widget.CardView;

import android.content.Intent;
import android.os.Bundle;

public class MainActivity extends AppCompatActivity {
    CardView list_mhs, add_mhs;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        pindah();
    }

    private void pindah() {
        list_mhs = findViewById(R.id.list_mhs);
        add_mhs = findViewById(R.id.add_mhs);

        list_mhs.setOnClickListener(view -> {
            Intent intent = new Intent(MainActivity.this, ListMhsActivity.class);
            startActivity(intent);
        });

        add_mhs.setOnClickListener(view -> {
            Intent intent = new Intent(MainActivity.this, TambahMhsActivity.class);
            startActivity(intent);
        });
    }
}