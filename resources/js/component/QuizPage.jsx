import React from "react";
import { useEffect, useRef, useState } from "react";
import ReactDOM from "react-dom/client";
import axios from "axios";
import { createPortal } from "react-dom";

function QuizPage() {
    const [records, setRecords] = useState([]);
    useEffect(() => {
        const getQuizdata = async () => {
            const reqdata = await fetch("http://127.0.0.1:8000/json");
            const resdata = await reqdata.json();
            setRecords(resdata);
        };
        getQuizdata();
    }, []);

    const [QuizEdit, setQuizEdit] = useState({
        question: "",
        answerA: "",
        answerB: "",
        answerC: "",
        answerD: "",
        Akey: "",
        id: "",
    });
    const EditQuiz = (Question, A, B, C, D, key, id) => {
        const question = Question;
        const answerA = A;
        const answerB = B;
        const answerC = C;
        const answerD = D;
        const Akey = key;
        const Quizid = id;

        setQuizEdit((prev) => {
            return {
                ...prev,
                question: question,
                answerA: answerA,
                answerB: answerB,
                answerC: answerC,
                answerD: answerD,
                Akey: Akey,
                id: Quizid,
            };
        });
    };
    const handleInputChange = (event) => {
        const name = event.target.name;
        const value = event.target.value;
        setQuizEdit((prev) => {
            return {
                ...prev,
                [name]: value,
            };
        });
    };

    const [search, setQuizSearch] = useState("");
    const [currentPage, setCurentPage] = useState(1);
    const recordsPerPage = 7;
    const lastIndex = currentPage * recordsPerPage;
    const firstIndex = lastIndex - recordsPerPage;
    // const record = records.slice(firstIndex, lastIndex);
    const npage = Math.ceil(records.length / recordsPerPage);
    const numbers = [...Array(npage + 1).keys()].slice(1);
    function prePage() {
        if (currentPage !== 1) {
            setCurentPage(currentPage - 1);
        }
    }
    function changeCPage(id) {
        setCurentPage(id);
    }
    function nextPage() {
        if (currentPage !== npage) {
            setCurentPage(currentPage + 1);
        }
    }
    return (
        <div>
            {createPortal(
                <div>
                    <input
                        type="text"
                        placeholder="Search here..."
                        onChange={(e) => setQuizSearch(e.target.value)}
                        className="searchhere"
                        style={{
                            padding: "10px",
                            borderRadius: "50px",
                            border: "1px solid #dee2e6",
                            width: "100%",
                        }}
                    />
                </div>,
                document.getElementById("searchQuiz")
            )}
            <table className="table max-w-7xl mx-auto" id="resizable">
                <thead className="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Questions</th>
                        <th>A</th>
                        <th>B</th>
                        <th>C</th>
                        <th>D</th>
                        <th>Key</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    {records
                        .filter((item) => {
                            return search.toLowerCase() === ""
                                ? item
                                : item.Question.toLowerCase().includes(search);
                        })
                        .sort((a, b) => (a.id > b.id ? -1 : 1))
                        .slice(firstIndex, lastIndex)
                        .map((rec, index) => (
                            <tr key={index}>
                                <td>{rec.Qnum}</td>
                                <td>{rec.Question}</td>
                                <td>{rec.Aa}</td>
                                <td>{rec.Ab}</td>
                                <td>{rec.Ac}</td>
                                <td>{rec.Ad}</td>
                                <td>{rec.Akey}</td>
                                <td>
                                    <a
                                        data-bs-toggle="modal"
                                        data-bs-target="#EditQuizModal"
                                        onClick={() =>
                                            EditQuiz(
                                                rec.Question,
                                                rec.Aa,
                                                rec.Ab,
                                                rec.Ac,
                                                rec.Ad,
                                                rec.Akey,
                                                rec.id
                                            )
                                        }
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="16"
                                            height="16"
                                            fill="#fca903"
                                            className="bi bi-pencil-square"
                                            viewBox="0 0 16 16"
                                        >
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path
                                                fill-rule="evenodd"
                                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"
                                            />
                                        </svg>
                                    </a>
                                    <a
                                        href={`./delete/${rec.id}`}
                                        style={{
                                            cursor: "pointer",
                                        }}
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="16"
                                            height="16"
                                            fill="#ff5147"
                                            className="bi bi-trash-fill"
                                            viewBox="0 0 16 16"
                                        >
                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        ))}
                </tbody>
            </table>
            {createPortal(
                <div>
                    <nav>
                        <ul className="pagination">
                            <li className="page-item">
                                <a
                                    href="#"
                                    className="page-link"
                                    onClick={prePage}
                                >
                                    Prev
                                </a>
                            </li>
                            {numbers.map((n, i) => (
                                <li
                                    className={`page-item ${
                                        currentPage === n ? "active" : ""
                                    }`}
                                    key={i}
                                >
                                    <a
                                        href="#"
                                        className="page-link"
                                        onClick={() => changeCPage(n)}
                                    >
                                        {n}
                                    </a>
                                </li>
                            ))}
                            <li className="page-item">
                                <a
                                    href="#"
                                    className="page-link"
                                    onClick={nextPage}
                                >
                                    Next
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>,
                document.getElementById("paginateQuiz")
            )}
            {createPortal(
                <div>
                    <div
                        class="modal fade"
                        id="EditQuizModal"
                        tabindex="-1"
                        aria-labelledby="exampleModalLabel"
                        aria-hidden="true"
                    >
                        <div className="modal-dialog">
                            <div className="modal-content">
                                <div className="modal-header">
                                    <h5
                                        className="modal-title"
                                        id="exampleModalLabel"
                                    >
                                        Edit Question
                                    </h5>
                                    <button
                                        type="button"
                                        className="btn-close"
                                        data-bs-dismiss="modal"
                                        aria-label="Close"
                                    ></button>
                                </div>

                                <div className="modal-body">
                                    <input
                                        name="QuizID"
                                        type="hidden"
                                        value={QuizEdit.id}
                                        readOnly
                                    />
                                    <div className="mb-3">
                                        <label
                                            for="message-text"
                                            className="col-form-label"
                                        >
                                            Question:
                                        </label>
                                        <textarea
                                            name="question"
                                            className="form-control"
                                            id="message-text"
                                            value={QuizEdit.question}
                                            onChange={handleInputChange}
                                        ></textarea>
                                    </div>
                                    <div className="mb-3">
                                        <label
                                            for="recipient-name"
                                            className="col-form-label"
                                        >
                                            A:
                                        </label>
                                        <input
                                            name="answerA"
                                            type="text"
                                            className="form-control"
                                            id="recipient-name"
                                            value={QuizEdit.answerA}
                                            onChange={handleInputChange}
                                        />
                                    </div>
                                    <div className="mb-3">
                                        <label
                                            for="recipient-name"
                                            className="col-form-label"
                                        >
                                            B:
                                        </label>
                                        <input
                                            name="answerB"
                                            type="text"
                                            className="form-control"
                                            id="recipient-name"
                                            value={QuizEdit.answerB}
                                            onChange={handleInputChange}
                                        />
                                    </div>
                                    <div className="mb-3">
                                        <label
                                            for="recipient-name"
                                            className="col-form-label"
                                        >
                                            C:
                                        </label>
                                        <input
                                            name="answerC"
                                            type="text"
                                            className="form-control"
                                            id="recipient-name"
                                            value={QuizEdit.answerC}
                                            onChange={handleInputChange}
                                        />
                                    </div>
                                    <div className="mb-3">
                                        <label
                                            for="recipient-name"
                                            className="col-form-label"
                                        >
                                            D:
                                        </label>
                                        <input
                                            name="answerD"
                                            type="text"
                                            className="form-control"
                                            id="recipient-name"
                                            value={QuizEdit.answerD}
                                            onChange={handleInputChange}
                                        />
                                    </div>
                                    <div className="mb-3">
                                        <label
                                            for="recipient-name"
                                            className="col-form-label"
                                        >
                                            key:
                                        </label>
                                        <input
                                            name="Akey"
                                            type="text"
                                            className="form-control"
                                            id="recipient-name"
                                            value={QuizEdit.Akey}
                                            onChange={handleInputChange}
                                        />
                                    </div>

                                    <button
                                        type="submit"
                                        className="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                                    >
                                        Save
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>,
                document.getElementById("EditPortal")
            )}
        </div>
    );
}
const container = document.getElementById("quizpage");
const root = ReactDOM.createRoot(container);
root.render(<QuizPage />);
export default QuizPage;
