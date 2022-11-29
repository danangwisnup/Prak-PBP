package com.example.myviewandviews;

import androidx.appcompat.app.AppCompatActivity;

import android.annotation.SuppressLint;
import android.os.Bundle;
import android.widget.Button;

public class BuyActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_buy);

        getSupportActionBar().setTitle("Smartphone Store");

        @SuppressLint({"MissingInflatedId", "LocalSuppress"})
        Button backButton = findViewById(R.id.btnBack);
        backButton.setOnClickListener(v -> finish());
    }
}