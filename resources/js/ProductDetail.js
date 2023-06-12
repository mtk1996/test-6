import axios from "axios";
import React, { useState } from "react";
import { createRoot } from "react-dom/client";
import StarRatings from "react-star-ratings";
const product = blade_product_data;
const App = () => {
    const [reviews, setReviews] = useState(product.product_review);
    const [review, setReview] = useState("");
    const [reviewCount, setReviewCount] = useState(0);
    const addToCart = () => {
        const productSlug = product.slug;
        const data = new FormData();
        data.append("slug", productSlug);
        axios.post("/api/add-to-cart", data).then((res) => {
            if (res.data == "product_not_found") {
                errorToast("Product Not Found");
                return;
            }
            if (res.data == "not_auth") {
                errorToast("Please Login First");
                return;
            }
            changeCartCount(res.data.cart_count);
            successToast("Added To Cart.");
        });
    };

    // make reivew
    const makeReview = () => {
        const slug = product.slug;
        const data = new FormData();
        data.append("rating", reviewCount);
        data.append("review", review);
        data.append("slug", slug);
        axios.post("/api/make-review", data).then((res) => {
            if (res.data == "product_not_found") {
                errorToast("product not found.");
                return;
            }
            setReviews([...reviews, res.data]);
            setReview("");
            setReviewCount(0);
            successToast("Review Stored");
        });
    };
    return (
        <>
            <div className="card p-4">
                <div className="row">
                    <div className="col-12 mb-3">
                        <h3>{product.name}</h3>
                        <div>
                            <small className="text-muted">Brand:</small>
                            <small>{product.brand.name}</small>|
                            <small className="text-muted">Category:</small>
                            {product.category.map((d) => (
                                <small
                                    key={d.id}
                                    className="badge badge-dark ml-1"
                                >
                                    {d.name}
                                </small>
                            ))}
                        </div>
                    </div>
                    <div className="col-12 col-sm-12 col-md-4 col-lg-4">
                        <img
                            className="w-100"
                            src={`/images/${product.image}`}
                            alt=""
                        />
                    </div>
                    <div className="col-12 col-sm-12 col-md-8 col-lg-8">
                        <div className="mt-5">
                            <p>
                                <small className="text-muted">
                                    <strike>
                                        {product.discounted_price}ks
                                    </strike>
                                </small>
                                <span className="text-danger fs-1 d-inline">
                                    {product.sell_price}ks
                                </span>
                                <br />
                                <span className="btn btn-sm btn-outline-success text-success mt-3">
                                    InStock :{product.stock_qty}
                                </span>
                                <button
                                    // disabled={}
                                    className="btn btn-sm btn-danger mt-3"
                                    onClick={addToCart}
                                >
                                    <i className="fas fa-shopping-cart" />
                                    Add To Cart
                                </button>
                            </p>
                            <p className="mt-5">
                                <div
                                    dangerouslySetInnerHTML={{
                                        __html: product.description,
                                    }}
                                />
                            </p>
                            <small className="text-muted">
                                Available Color:
                            </small>
                            {product.color.map((d) => (
                                <span key={d.id} className="badge badge-danger">
                                    Blue
                                </span>
                            ))}
                        </div>
                    </div>
                    <hr />
                    <div className="col-12" style={{ marginTop: 100 }}>
                        {/* loop review */}
                        {reviews.map((d) => (
                            <div key={d.id} className="review">
                                <div className="card p-3">
                                    <div className="row">
                                        <div className="col-md-2">
                                            <div className="d-flex justify-content-between">
                                                <img
                                                    className="w-100 rounded-circle"
                                                    src="assets/images/user.jpeg"
                                                    alt=""
                                                />
                                            </div>
                                        </div>
                                        <div className="col-md-10">
                                            <div className="rating">
                                                <StarRatings
                                                    rating={d.rating}
                                                    starRatedColor="orange"
                                                    numberOfStars={5}
                                                    name="rating"
                                                    starDimension={"15px"}
                                                />
                                            </div>
                                            <div className="name">
                                                <b>{d.user.name}</b>
                                            </div>
                                            <div className="mt-3">
                                                <small>{d.review}</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        ))}

                        <div className="add-review mt-5">
                            <h4>Make Review</h4>
                            <div className="">
                                <StarRatings
                                    rating={reviewCount}
                                    starRatedColor="orange"
                                    changeRating={(rate) => {
                                        setReviewCount(rate);
                                    }}
                                    numberOfStars={5}
                                    name="rating"
                                />
                            </div>
                            <div>
                                <textarea
                                    className="form-control"
                                    rows={5}
                                    placeholder="enter review"
                                    onChange={(e) => setReview(e.target.value)}
                                    value={review}
                                />
                                <button
                                    onClick={makeReview}
                                    className="btn btn-dark float-right mt-3"
                                >
                                    Review
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </>
    );
};

createRoot(document.querySelector("#root")).render(<App />);
