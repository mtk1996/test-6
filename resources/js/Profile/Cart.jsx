import axios from "axios";
import React, { useEffect, useState } from "react";

//data from profile.blade.php
const user = blade_user;

const Cart = () => {
    const [cart, setCart] = useState([]);
    //checkout state
    const [image, setImage] = useState({});
    const [name, setName] = useState(user.name);
    const [phone, setPhone] = useState(user.phone);
    const [address, setAddress] = useState(user.address);
    useEffect(() => {
        axios.get("/api/cart").then((res) => {
            setCart(res.data);
        });
    }, []);

    //add qty
    const addQty = (id) => {
        axios.post("/api/add-cart-qty", { id }).then((res) => {
            if (res.data == "success") {
                const newCart = cart.map((sCart) => {
                    if (sCart.id == id) {
                        sCart.qty += 1;
                    }
                    return sCart;
                });
                setCart(newCart);
                successToast("Qty Updated");
            }
        });
    };

    // checkout
    const checkout = () => {
        const data = new FormData();
        data.append("image", image);
        data.append("name", name);
        data.append("phone", phone);
        data.append("address", address);
        axios.post("/api/checkout-cart", data).then((res) => {
            if (res.data == "success") {
                setCart([]);
                successToast("Checkout Success.");
                changeCartCount(0);
            }
        });
    };
    return (
        <>
            <table className="table table-striped">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Qty</th>
                        <th>Total</th>
                        <th>+/-</th>
                    </tr>
                </thead>
                <tbody>
                    {cart.map((d) => (
                        <tr key={d.id}>
                            <td>
                                <img
                                    src={`/images/${d.product.image}`}
                                    style={{ width: 50, borderRadius: "50%" }}
                                />
                            </td>
                            <td>{d.product.name}</td>
                            <td>{d.qty}</td>
                            <td>{d.qty * d.product.sell_price}mmk</td>
                            <td>
                                <div className="d-flex">
                                    <button className="btn btn-sm btn-danger">
                                        -
                                    </button>
                                    <input
                                        disabled={true}
                                        value={d.qty}
                                        className="btn btn-secondary"
                                    />
                                    <button
                                        onClick={() => addQty(d.id)}
                                        className="btn btn-sm btn-danger"
                                    >
                                        +
                                    </button>
                                </div>
                            </td>
                        </tr>
                    ))}
                </tbody>
            </table>

            <div className="card card-body">
                <div className="form-group">
                    <label htmlFor="">Payment Screenshot</label>
                    <input
                        type="file"
                        className="form-control"
                        onChange={(e) => setImage(e.target.files[0])}
                    />
                </div>
                <div className="form-group">
                    <label htmlFor="">Phone</label>
                    <input
                        type="text"
                        value={phone}
                        className="form-control"
                        onChange={(e) => setPhone(e.target.value)}
                    />
                </div>
                <div className="form-group">
                    <label htmlFor="">Name</label>
                    <input
                        type="text"
                        value={name}
                        className="form-control"
                        onChange={(e) => setName(e.target.value)}
                    />
                </div>
                <div className="form-group">
                    <label htmlFor="">Full Address</label>
                    <textarea
                        className="form-control"
                        value={address}
                        onChange={(e) => setAddress(e.target.value)}
                    ></textarea>
                </div>
                <button className="btn btn-dark" onClick={checkout}>
                    CheckOut
                </button>
            </div>
        </>
    );
};

export default Cart;
