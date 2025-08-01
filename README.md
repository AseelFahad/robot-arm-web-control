
# 🤖 Robot Arm Web Control Panel

A web-based interactive interface to control a robotic arm using **HTML**, **CSS**, **JavaScript**, **PHP**, and **MySQL**.  
It allows saving movement commands (poses), running them, or loading them from an ESP32/ESP8266 unit.

---

## 🧩 Project Features

- Control 6 servos using sliders (0° to 180°).
- Save custom poses to the database.
- Run a selected pose by sending it to the execution table.
- Load previously saved poses for editing or re-use.
- Remove any saved pose from the database.
- ESP reads the execution command via `get_run_pose.php`.
- Execution status is updated via `update_status.php` after completion.

---

## 🖥️ Interface Overview

The interface includes:
- 6 sliders (Servo 1 to Servo 6).
- Buttons:
  - `Reset`: Resets all sliders to 90°.
  - `Save Pose`: Saves the current servo angles.
  - `Run`: Sends the current pose to be executed.
- A table listing all saved poses with:
  - `Load`: Loads pose values into sliders.
  - `Remove`: Deletes the selected pose.

---

## 🗃️ Database Structure

**Database name:** `robot_arm`

### Table: `pose`
Used to store user-defined poses:
```sql
CREATE TABLE pose (
  id INT AUTO_INCREMENT PRIMARY KEY,
  servo1 INT,
  servo2 INT,
  servo3 INT,
  servo4 INT,
  servo5 INT,
  servo6 INT
);
```

### Table: `run`
Used to store the current pose to be executed by the ESP:
```sql
CREATE TABLE run (
  id INT AUTO_INCREMENT PRIMARY KEY,
  servo1 INT,
  servo2 INT,
  servo3 INT,
  servo4 INT,
  servo5 INT,
  servo6 INT,
  status INT
);
```

---

## 📄 Project Files

| File Name            | Description                                                  |
|----------------------|--------------------------------------------------------------|
| `index.html`         | Main web interface to control the robotic arm.               |
| `db.php`             | Handles MySQL database connection.                           |
| `save_pose.php`      | Saves the current pose to the `pose` table.                  |
| `get_saved_poses.php`| Retrieves all saved poses for the frontend table.            |
| `remove_pose.php`    | Deletes a pose from the `pose` table.                        |
| `run_pose.php`       | Sends the current pose to the `run` table with `status = 1`. |
| `get_run_pose.php`   | Returns the current pose to be executed (for ESP).           |
| `update_status.php`  | Updates the execution status to `0` after ESP completes it.  |

---

## ⚙️ Setup Instructions

1. Start **Apache** and **MySQL** using XAMPP.
2. Create a new database named `robot_arm`.
3. Use the SQL commands above to create the tables.
4. Place all project files in `htdocs/robot_arm_web_control/`.
5. Open the interface in your browser:
   ```
   http://localhost/robot_arm_web_control/index.html
   ```

---

## 📡 ESP8266 / ESP32 Integration

- To read the current pose:
  ```http
  GET http://<your-pc-ip>/robot_arm_web_control/get_run_pose.php
  ```

- To update the execution status:
  ```http
  GET http://<your-pc-ip>/robot_arm_web_control/update_status.php
  ```

📌 Make sure the ESP device is connected to the same Wi-Fi network as your PC.

---

## 📸 Screenshots

<img width="1366" height="690" alt="html page" src="https://github.com/user-attachments/assets/4d9fd14e-3368-440a-be45-c35b13e606ea" />

---

<img width="1366" height="683" alt="PoseDatabase" src="https://github.com/user-attachments/assets/b1f15f7a-1b4f-43b2-85f1-76220be33458" />

---

<img width="1366" height="689" alt="RunDatabase" src="https://github.com/user-attachments/assets/83fc1172-9c44-4078-a83c-9b61bc761ea3" />

---

## 👨‍💻 Developer Note

This project was built for **educational** and **experimental** purposes to explore web-based robotic control and IoT concepts.

By **ASEEL** – 2025
