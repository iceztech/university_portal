<?php
namespace Zikzay\Database;


class Migration_210610_110823 extends Migration {

    public function up() {

        $this->createTable("p_u_t_m_e_transactions", "id", "INT NOT NULL ", " AUTO_INCREMENT");
        $this->addColumn("p_u_t_m_e_transactions", "student", "INT UNSIGNED NULL ");
        $this->addColumn("p_u_t_m_e_transactions", "amount", "INT UNSIGNED NULL ");
        $this->addColumn("p_u_t_m_e_transactions", "purpose", "VARCHAR(256) NULL ");
        $this->addColumn("p_u_t_m_e_transactions", "description", "VARCHAR(256) NULL ");
        $this->addColumn("p_u_t_m_e_transactions", "status", "VARCHAR(16) NULL ");
        $this->addColumn("p_u_t_m_e_transactions", "reference", "VARCHAR(16) NULL ");
        $this->addColumn("p_u_t_m_e_transactions", "source", "VARCHAR(16) NULL ");
        $this->addColumn("p_u_t_m_e_transactions", "source_reference", "VARCHAR(64) NULL ");
        $this->addColumn("p_u_t_m_e_transactions", "created_at", "TIMESTAMP  NULL DEFAULT CURRENT_TIMESTAMP");
        $this->addColumn("p_u_t_m_e_transactions", "updated_at", "TIMESTAMP on update CURRENT_TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP");


        $this->createTable("student_transactions", "id", "INT NOT NULL ", " AUTO_INCREMENT");
        $this->addColumn("student_transactions", "student", "INT UNSIGNED NULL ");
        $this->addColumn("student_transactions", "amount", "INT UNSIGNED NULL ");
        $this->addColumn("student_transactions", "purpose", "VARCHAR(256) NULL ");
        $this->addColumn("student_transactions", "description", "VARCHAR(256) NULL ");
        $this->addColumn("student_transactions", "status", "VARCHAR(16) NULL ");
        $this->addColumn("student_transactions", "reference", "VARCHAR(16) NULL ");
        $this->addColumn("student_transactions", "source", "VARCHAR(16) NULL ");
        $this->addColumn("student_transactions", "source_reference", "VARCHAR(64) NULL ");
        $this->addColumn("student_transactions", "created_at", "TIMESTAMP  NULL DEFAULT CURRENT_TIMESTAMP");
        $this->addColumn("student_transactions", "updated_at", "TIMESTAMP on update CURRENT_TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP");

    }
    
    public function down() { 
        
    }
}