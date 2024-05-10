import React from "react";
import { useEffect, useRef, useState } from "react";
import ReactDOM from "react-dom/client";

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

    // State to hold the table rows
    const [rows, setRows] = useState([{ name: "", email: "" }]);

    // Function to add a new row
    const addRow = () => {
        setRows([...rows, { name: "", email: "" }]);
    };

    // Function to handle changes in input fields
    const handleInputChange = (index, fieldName, value) => {
        const newRows = [...rows];
        newRows[index][fieldName] = value;
        setRows(newRows);
    };

    // Function to remove a row
    const removeRow = (index) => {
        const newRows = [...rows];
        newRows.splice(index, 1);
        setRows(newRows);
    };

    const resizeInput = () => {
        const input = document.getElementById("inputField");
        const length = input.value.length;

        // Set width based on the length of the input value
        input.style.width = length * 10 + "px"; // Adjust the multiplier to suit your needs

        // Set height based on the number of lines (assuming 1 line per 20 characters)
        const lines = Math.ceil(length / 20);
        input.style.height = lines * 20 + "px"; // Adjust the multiplier and padding to suit your needs
    };

    function autoResize() {
        const textarea = document.getElementById("textInput");
        textarea.style.height = "auto"; // Reset height to auto
        textarea.style.height = textarea.scrollHeight + "px"; // Set height to scroll height
    }

    return (
        <div>
            <table className="max-w-7xl mx-auto">
                <thead>
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
                    {records.map((rec, index) => (
                        <tr key={index}>
                            <td>{rec.Qnum}</td>
                            <td>{rec.Question}</td>
                            <td>{rec.Aa}</td>
                            <td>{rec.Ab}</td>
                            <td>{rec.Ac}</td>
                            <td>{rec.Ad}</td>
                            <td>{rec.Akey}</td>
                            <td>
                                <a>
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
                                    onClick={() => removeRow(index)}
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
                    {rows.map((row, index) => (
                        <tr key={index}>
                            <td className="p-0">
                                <textarea
                                    id="inputField"
                                    name="Qnum"
                                    type="text"
                                    value={row.name}
                                    onChange={(e) =>
                                        handleInputChange(
                                            index,
                                            "name",
                                            e.target.value
                                        )
                                    }
                                    onInput={resizeInput}
                                />
                            </td>
                            <td className="p-0">
                                <textarea
                                    id="inputField"
                                    name="Qquestion"
                                    type="text"
                                    value={row.email}
                                    onChange={(e) =>
                                        handleInputChange(
                                            index,
                                            "email",
                                            e.target.value
                                        )
                                    }
                                    onInput={resizeInput}
                                />
                            </td>
                            <td className="p-0">
                                <textarea
                                    type="text"
                                    name="Aa"
                                    value={""}
                                    onChange={(e) =>
                                        handleInputChange(
                                            index,
                                            "",
                                            e.target.value
                                        )
                                    }
                                    className="w-100 h-100"
                                />
                            </td>
                            <td className="p-0">
                                <textarea
                                    name="Ab"
                                    type="text"
                                    value={""}
                                    onChange={(e) =>
                                        handleInputChange(
                                            index,
                                            "",
                                            e.target.value
                                        )
                                    }
                                    className="w-100 h-100"
                                />
                            </td>
                            <td className="p-0">
                                <textarea
                                    name="Ac"
                                    type="text"
                                    value={""}
                                    onChange={(e) =>
                                        handleInputChange(
                                            index,
                                            "",
                                            e.target.value
                                        )
                                    }
                                    className="w-100 h-100"
                                />
                            </td>
                            <td className="p-0">
                                <textarea
                                    name="Ad"
                                    type="text"
                                    value={""}
                                    onChange={(e) =>
                                        handleInputChange(
                                            index,
                                            "",
                                            e.target.value
                                        )
                                    }
                                    className="w-100 h-100"
                                />
                            </td>
                            <td className="p-0">
                                <textarea
                                    name="Akey"
                                    type="email"
                                    value={""}
                                    onChange={(e) =>
                                        handleInputChange(
                                            index,
                                            "email",
                                            e.target.value
                                        )
                                    }
                                />
                            </td>
                            <td>
                                <a>
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
                                    onClick={() => removeRow(index)}
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
            <a
                onClick={addRow}
                className="mt-2 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                style={{ cursor: "pointer" }}
            >
                Add Row
            </a>
        </div>
    );
}
const container = document.getElementById("quizpage");
const root = ReactDOM.createRoot(container);
root.render(<QuizPage />);
export default QuizPage;
