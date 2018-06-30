package main

import (
	"database/sql"
	"encoding/json"
	"fmt"
	"log"
	"net/http"
	"os"

	_ "github.com/go-sql-driver/mysql"
)

type configuration struct {
	DbName string
	DbUser string
	DbPass string
}

func main() {
	file, err := os.Open("config.json")
	if err != nil {
		log.Fatal(err)
	}

	fmt.Print("Loading configuration ... ")
	cfg := configuration{}
	decoder := json.NewDecoder(file)
	err = decoder.Decode(&cfg)
	if err != nil {
		log.Fatal(err)
	}
	fmt.Println("done")

	fmt.Print("Connecting to database ... ")
	db, err := sql.Open("mysql", cfg.DbUser+":"+cfg.DbPass+"@/"+cfg.DbName)
	if err != nil {
		log.Fatal(err)
	}
	defer db.Close()
	fmt.Println("done")

	http.HandleFunc("/list", func(w http.ResponseWriter, r *http.Request) {
		rows, err := db.Query("select id, title from item")
		if err != nil {
			log.Fatal(err)
		}
		defer rows.Close()

		var data []string
		for rows.Next() {
			var id string
			var title string

			if err = rows.Scan(&id, &title); err != nil {
				log.Fatal(err)
			}

			data = append(data, title)
		}

		str, err := json.Marshal(data)
		if err != nil {
			log.Fatal(err)
		}

		w.Header().Add("Content-Type", "application/json; charset=utf-8")
		w.Write(str)
	})

	print("Listening on localhost:8080\n")
	http.ListenAndServe("localhost:8080", nil)
}
