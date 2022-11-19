package com.example.myviewandviews;

import androidx.appcompat.app.AppCompatActivity;

import android.annotation.SuppressLint;

import android.content.Intent;
import android.net.Uri;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

public class MainActivity extends AppCompatActivity implements View.OnClickListener{

    @SuppressLint("MissingInflatedId")
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        if (getSupportActionBar() != null) {
            getSupportActionBar().setTitle("Google Pixel");
        }

        Button csButton = findViewById(R.id.btnCs);
        csButton.setOnClickListener(this);

        Button buyButton = findViewById(R.id.btnBuy);
        buyButton.setOnClickListener(this);
    }

    @Override
    public void onClick(View v) {
        switch (v.getId()) {
            case R.id.btnCs:
                String phoneNumber = "082122255122";
                Intent dialPhoneIntent = new Intent(Intent.ACTION_DIAL, Uri.parse("tel:"+phoneNumber));
                startActivity(dialPhoneIntent);
                break;
            case R.id.btnBuy:
                Intent moveIntent = new Intent(MainActivity.this, BuyActivity.class);
                startActivity(moveIntent);
                break;
        }
    }
}
