package com.example.chatbot;

import android.Manifest;
import android.content.BroadcastReceiver;
import android.content.Context;
import android.content.Intent;
import android.content.IntentFilter;
import android.content.pm.PackageManager;
import android.net.wifi.ScanResult;
import android.net.wifi.WifiInfo;
import android.net.wifi.WifiManager;
import android.os.BatteryManager;
import android.os.Build;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.ImageButton;
import android.widget.TextView;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;
import androidx.core.app.ActivityCompat;
import androidx.core.content.ContextCompat;

import java.util.List;

public class NewActivity extends AppCompatActivity {

    private static final int PERMISSION_REQUEST_CODE = 123;

    private TextView wifiDetailsTextView;
    private TextView batteryDetailsTextView;
    private ImageButton getWifiDetailsButton;
    private ImageButton getBatteryDetailsButton;

    private BroadcastReceiver batteryReceiver;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_new);

        wifiDetailsTextView = findViewById(R.id.text_wifi_details);
        batteryDetailsTextView = findViewById(R.id.text_battery_details);
        getWifiDetailsButton = findViewById(R.id.btn_get_wifi_details);
        getBatteryDetailsButton = findViewById(R.id.btn_get_battery_details);


        getWifiDetailsButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                checkAndRequestPermissions();
            }
        });

        getBatteryDetailsButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                retrieveBatteryDetails();
            }
        });
    }

    private void checkAndRequestPermissions() {
        if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.M) {
            if (ContextCompat.checkSelfPermission(this, Manifest.permission.ACCESS_FINE_LOCATION) != PackageManager.PERMISSION_GRANTED) {
                ActivityCompat.requestPermissions(this, new String[]{Manifest.permission.ACCESS_FINE_LOCATION}, PERMISSION_REQUEST_CODE);
            } else {
                retrieveWifiDetails();
            }
        } else {
            retrieveWifiDetails();
        }
    }

    private void retrieveWifiDetails() {
        WifiManager wifiManager = (WifiManager) getApplicationContext().getSystemService(Context.WIFI_SERVICE);

        if (wifiManager != null) {
            WifiInfo wifiInfo = wifiManager.getConnectionInfo();
            if (ActivityCompat.checkSelfPermission(this, Manifest.permission.ACCESS_FINE_LOCATION) != PackageManager.PERMISSION_GRANTED) {
                // TODO: Consider calling
                //    ActivityCompat#requestPermissions
                // here to request the missing permissions, and then overriding
                //   public void onRequestPermissionsResult(int requestCode, String[] permissions,
                //                                          int[] grantResults)
                // to handle the case where the user grants the permission. See the documentation
                // for ActivityCompat#requestPermissions for more details.
                return;
            }
            List<ScanResult> scanResults = wifiManager.getScanResults();

            // Get the details of the connected Wi-Fi network
            String ssid = wifiInfo.getSSID();
            String bssid = wifiInfo.getBSSID();
            int signalStrength = wifiInfo.getRssi();

            // Display the Wi-Fi details
            String wifiDetails = "Connected Wi-Fi Details:\n" +
                    "SSID: " + ssid + "\n" +
                    "BSSID: " + bssid + "\n" +
                    "Signal Strength: " + signalStrength + " dBm\n\n";

            // Append available Wi-Fi networks details
            wifiDetails += "Available Wi-Fi Networks:\n";
            for (ScanResult scanResult : scanResults) {
                String networkSSID = scanResult.SSID;
                String networkBSSID = scanResult.BSSID;
                int networkSignalStrength = scanResult.level;

                wifiDetails += "SSID: " + networkSSID + "\n" +
                        "BSSID: " + networkBSSID + "\n" +
                        "Signal Strength: " + networkSignalStrength + " dBm\n\n";
            }

            wifiDetailsTextView.setText(wifiDetails);
        }
    }

    private void retrieveBatteryDetails() {
        IntentFilter intentFilter = new IntentFilter(Intent.ACTION_BATTERY_CHANGED);
        batteryReceiver = new BroadcastReceiver() {
            @Override
            public void onReceive(Context context, Intent intent) {
                int level = intent.getIntExtra(BatteryManager.EXTRA_LEVEL, -1);
                int scale = intent.getIntExtra(BatteryManager.EXTRA_SCALE, -1);
                int batteryPercentage = (int) ((level / (float) scale) * 100);

                int status = intent.getIntExtra(BatteryManager.EXTRA_STATUS, -1);
                boolean isCharging = status == BatteryManager.BATTERY_STATUS_CHARGING ||
                        status == BatteryManager.BATTERY_STATUS_FULL;

                int chargePlug = intent.getIntExtra(BatteryManager.EXTRA_PLUGGED, -1);
                boolean isUSBCharging = chargePlug == BatteryManager.BATTERY_PLUGGED_USB;
                boolean isACCharging = chargePlug == BatteryManager.BATTERY_PLUGGED_AC;
                boolean isWirelessCharging = chargePlug == BatteryManager.BATTERY_PLUGGED_WIRELESS;

                int health = intent.getIntExtra(BatteryManager.EXTRA_HEALTH, -1);
                String batteryHealth = "Unknown";
                switch (health) {
                    case BatteryManager.BATTERY_HEALTH_GOOD:
                        batteryHealth = "Good";
                        break;
                    case BatteryManager.BATTERY_HEALTH_OVERHEAT:
                        batteryHealth = "Overheated";
                        break;
                    case BatteryManager.BATTERY_HEALTH_DEAD:
                        batteryHealth = "Dead";
                        break;
                    case BatteryManager.BATTERY_HEALTH_OVER_VOLTAGE:
                        batteryHealth = "Over Voltage";
                        break;
                    case BatteryManager.BATTERY_HEALTH_UNSPECIFIED_FAILURE:
                        batteryHealth = "Unspecified Failure";
                        break;
                    case BatteryManager.BATTERY_HEALTH_COLD:
                        batteryHealth = "Cold";
                        break;
                }


                int voltage = intent.getIntExtra(BatteryManager.EXTRA_VOLTAGE, -1);
                int temperature = intent.getIntExtra(BatteryManager.EXTRA_TEMPERATURE, -1);

                // Display the battery details
                String batteryDetails = "Battery Details:\n" +
                        "Battery Percentage: " + batteryPercentage + "%\n" +
                        "Charging Status: " + (isCharging ? "Charging" : "Not Charging") + "\n" +
                        "Charging Method: " + getChargingMethod(isUSBCharging, isACCharging, isWirelessCharging) + "\n" +
                        "Health: " + batteryHealth + "\n" +
                        "Voltage: " + voltage + " mV\n" +
                        "Temperature: " + (temperature / 10) + " °C";

                batteryDetailsTextView.setText(batteryDetails);
            }
        };
        registerReceiver(batteryReceiver, intentFilter);
    }

    private String getChargingMethod(boolean isUSBCharging, boolean isACCharging, boolean isWirelessCharging) {
        if (isUSBCharging) {
            return "USB Charging";
        } else if (isACCharging) {
            return "AC Charging";
        } else if (isWirelessCharging) {
            return "Wireless Charging";
        } else {
            return "Unknown";
        }
    }

    @Override
    protected void onDestroy() {
        super.onDestroy();
        if (batteryReceiver != null) {
            unregisterReceiver(batteryReceiver);
        }
    }

    @Override
    public void onRequestPermissionsResult(int requestCode, @NonNull String[] permissions, @NonNull int[] grantResults) {
        super.onRequestPermissionsResult(requestCode, permissions, grantResults);
        if (requestCode == PERMISSION_REQUEST_CODE) {
            if (grantResults.length > 0 && grantResults[0] == PackageManager.PERMISSION_GRANTED) {
                retrieveWifiDetails();
            } else {
                Toast.makeText(this, "Permission denied. Unable to retrieve Wi-Fi details.", Toast.LENGTH_SHORT).show();
            }
        }
    }
}
