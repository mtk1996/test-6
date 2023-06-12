import React from "react";

const Address = () => {
    return (
        <>
            <div className="card card-body">
                <div className="form-group">
                    <label htmlFor="">Enter Name</label>
                    <input type="text" className="form-control" />
                </div>
                <div className="form-group">
                    <label htmlFor="">Enter Phone</label>
                    <input type="text" className="form-control" />
                </div>

                <div className="form-group">
                    <label htmlFor="">Enter Phone</label>
                    <textarea className="form-control"></textarea>
                </div>
                <div>
                    <button className="btn btn-dark">Change</button>
                </div>
            </div>
        </>
    );
};

export default Address;
