import axios from "axios";
import React, { useState } from "react";

const ChangePassword = () => {
    const [current, setCurrent] = useState("");
    const [newP, setNewP] = useState("");

    const changePassword = () => {
        const data = {
            current,
            newPassword: newP,
        };
        axios.post("/api/change-password", data).then(({ data }) => {
            if (data == "wrong_password") {
                return errorToast("Wrong Current Password");
            }
            return successToast("Password Changed Successfully.");
        });
    };
    return (
        <>
            <div className="card card-body">
                <div className="form-group">
                    <label htmlFor="">Enter Current Password</label>
                    <input
                        type="password"
                        className="form-control"
                        value={current}
                        onChange={(e) => setCurrent(e.target.value)}
                    />
                </div>
                <div className="form-group">
                    <label htmlFor="">Enter New Password</label>
                    <input
                        type="password"
                        className="form-control"
                        value={newP}
                        onChange={(e) => setNewP(e.target.value)}
                    />
                </div>
                <button onClick={changePassword} className="btn btn-dark">
                    Change
                </button>
            </div>
        </>
    );
};

export default ChangePassword;
