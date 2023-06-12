import axios from "axios";
import React, { useEffect, useState } from "react";
import Loader from "../Loader";

const Order = () => {
    const [orderData, setOrderData] = useState({});
    const [order, setOrder] = useState([]);
    const [loader, setLoader] = useState(true);

    const [page, setPage] = useState(1);
    useEffect(() => {
        setLoader(true);
        axios.get("/api/order?page=" + page).then((res) => {
            setOrderData(res.data);
            setOrder(res.data.data);
            setLoader(false);
        });
    }, [page]);
    return (
        <>
            <div className="d-flex p-5 justify-content-center align-items-center">
                {loader && <Loader />}
            </div>

            {!loader && (
                <>
                    <table className="table table-striped">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Qty</th>
                                <th>Price</th>
                                <th>status</th>
                            </tr>
                        </thead>
                        <tbody>
                            {order.map((d) => (
                                <tr key={d.id}>
                                    <td>
                                        <img
                                            src={`/images/${d.product.image}`}
                                            style={{
                                                width: 50,
                                                borderRadius: "50%",
                                            }}
                                        />
                                    </td>
                                    <td>{d.product.name}</td>
                                    <td>{d.qty}</td>
                                    <td>{d.product.sell_price * d.qty}mmk</td>
                                    <td>
                                        {d.status == "pending" && (
                                            <span className="badge badge-warning">
                                                Pending
                                            </span>
                                        )}
                                        {d.status == "success" && (
                                            <span className="badge badge-success">
                                                Success
                                            </span>
                                        )}
                                        {d.status == "cancel" && (
                                            <span className="badge badge-danger">
                                                Cancel
                                            </span>
                                        )}
                                    </td>
                                </tr>
                            ))}
                        </tbody>
                    </table>
                    <button
                        className="btn btn-dark"
                        disabled={
                            orderData.prev_page_url == null ? true : false
                        }
                        onClick={() => setPage(page - 1)}
                    >
                        Pre
                    </button>
                    <button
                        className="btn btn-dark"
                        disabled={
                            orderData.next_page_url == null ? true : false
                        }
                        onClick={() => setPage(page + 1)}
                    >
                        Next
                    </button>
                </>
            )}
        </>
    );
};

export default Order;
